<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ParentModel;
use App\Models\Student;
use App\Models\Registration;
use App\Models\Payment;
use App\Models\PaymentGatewaySetting; // Add this line
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\RegistrationNotification;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Batch; // Add this line
use Midtrans\Config; // Add this line
use Midtrans\Snap; // Add this line
use App\Models\StudentRegistration; // Add this line

class RegistrationForm extends Component
{
    public $currentStep = 1;
    public $parent = [
        'nik' => '',
        'name' => '',
        'email' => '',
        'phone' => '',
        'address' => '',
        'students' => [
            ['name' => '', 'gender' => '', 'birth_date' => '', 'birth_place' => '']
        ]
    ];

    public $nominalPembayaran;
    public $totalPembayaran;
    public $paymentMethod; // Add this line
    public $batch_id; // Add this line

    protected $listeners = ['calculateTotalPembayaran'];

    protected $rules = [
        'parent.nik' => 'required|numeric',
        'parent.name' => 'required|string|max:255',
        'parent.email' => 'required|email|max:255',
        'parent.phone' => 'required|string|max:15',
        'parent.address' => 'required|string|max:255',
        'parent.students.*.name' => 'required|string|max:255',
        'parent.students.*.gender' => 'required|string|in:male,female',
        'parent.students.*.birth_date' => 'required|date',
        'parent.students.*.birth_place' => 'required|string|max:255',
        'paymentMethod' => 'required|string', // Ensure this rule is present
    ];

    public function mount()
    {
        $this->calculateTotalPembayaran();
    }

    public function addStudent()
    {
        $this->parent['students'][] = ['name' => '', 'gender' => '', 'birth_date' => '', 'birth_place' => ''];
        $this->calculateTotalPembayaran();
    }

    public function removeStudent($index)
    {
        unset($this->parent['students'][$index]);
        $this->parent['students'] = array_values($this->parent['students']);
        $this->calculateTotalPembayaran();
    }

    public function calculateTotalPembayaran()
    {
        $biayaPerSiswa = env('BIAYA_PER_SISWA', 200000);
        $this->totalPembayaran = count($this->parent['students']) * $biayaPerSiswa;
    }

    public function nextStep()
    {
        $this->currentStep = 2;
    }

    public function previousStep()
    {
        $this->currentStep = 1;
    }

    public function submit()
    {
        // $this->validate();

        if (is_null($this->paymentMethod) || empty($this->paymentMethod)) {
            session()->flash('error', 'Metode pembayaran harus dipilih.');
            return;
        }

        if (is_null($this->batch_id) || empty($this->batch_id)) {
            session()->flash('error', 'Gelombang pendaftaran harus dipilih.');
            return;
        }

        DB::beginTransaction();

        try {
            $parent = ParentModel::create([
                'nik' => $this->parent['nik'],
                'name' => $this->parent['name'],
                'email' => $this->parent['email'],
                'phone' => $this->parent['phone'],
                'address' => $this->parent['address']
            ]);

            $registration = Registration::create([
                'parent_id' => $parent->id,
                'status' => 'pending',
                'amount' => $this->totalPembayaran,
                'batch_id' => $this->batch_id // Add this line
            ]);

            foreach ($this->parent['students'] as $student) {
                $studentModel = Student::create([
                    'parent_id' => $parent->id,
                    'name' => $student['name'],
                    'gender' => $student['gender'],
                    'birth_date' => $student['birth_date'],
                    'birth_place' => $student['birth_place'],
                    'status' => 'pending',
                    'stage' => 'data review'
                ]);

                // $registration->students()->attach($studentModel->id);
                // Insert registration code into student_registrations
                StudentRegistration::create([
                    'registration_id' => $registration->id,
                    'student_id' => $studentModel->id,
                    'registration_code' => (new StudentRegistration)->generateRegistrationCode()
                ]);
            }

            $payment = Payment::create([
                'registration_id' => $registration->id,
                'method' => $this->paymentMethod,
                'status' => 'pending',
                'amount' => $this->totalPembayaran
            ]);

            // Generate user for parent login
            // $password = Str::random(8);
            $password = 'password'; // Change this line
            $user = User::create([
                'name' => $this->parent['name'],
                'email' => $this->parent['email'],
                'password' => Hash::make($password),
                'isAdmin' => false
            ]);

            // Midtrans integration
            $midtransConfig = PaymentGatewaySetting::where('provider', 'midtrans')->where('is_enabled', true)->first();
            if ($midtransConfig) {
                Config::$serverKey = $midtransConfig->server_key;
                Config::$isProduction = $midtransConfig->is_production;
                Config::$isSanitized = true;
                Config::$is3ds = true;

                $params = [
                    'transaction_details' => [
                        'order_id' => $payment->id,
                        'gross_amount' => $this->totalPembayaran,
                    ],
                    'customer_details' => [
                        'first_name' => $this->parent['name'],
                        'email' => $this->parent['email'],
                        'phone' => $this->parent['phone'],
                    ],
                ];

                $snapToken = Snap::getSnapToken($params);
                $redirect_url = 'https://app.sandbox.midtrans.com/snap/v2/vtweb/' . $snapToken;

                $payment->snap_token = $snapToken;
                $payment->snap_url = $redirect_url;
                $payment->save();

                DB::commit();

                // Send notification with login details
                Notification::route('mail', $this->parent['email'])->notify(new RegistrationNotification($registration, $user->email, $password));

                // Reset form
                // $this->resetForm();
                return redirect($redirect_url);
            } else {
                throw new \Exception('Midtrans configuration not found or not enabled.');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Pendaftaran gagal: ' . $e->getMessage());
        }
    }

    private function resetForm()
    {
        $this->currentStep = 1;
        $this->parent = [
            'nik' => '',
            'name' => '',
            'email' => '',
            'phone' => '',
            'address' => '',
            'students' => [
                ['name' => '', 'gender' => '', 'birth_date' => '', 'birth_place' => '']
            ]
        ];
        $this->paymentMethod = null;
        $this->nominalPembayaran = null;
        $this->totalPembayaran = null;
        $this->batch_id = null; // Add this line
    }

    public function render()
    {
        $isPortal = false; // Define the $isPortal variable

        if (auth()->check()) {
            $user = auth()->user();
            $userProfile = ParentModel::where('email', $user->email)->first();
            return view('livewire.profile-parents', compact('userProfile'))->layout('components.layouts.app', [
                'title' => 'Profile Page',
                'isPortal' => $isPortal,
                'userProfile' => $userProfile
            ]);
        }

        $batches = Batch::where('is_enabled', true)->get(); // Fetch all enabled batches
        return view('livewire.registration-form', compact('isPortal', 'batches'))->layout('components.layouts.app', [
            'title' => 'Registration Page',
            'isPortal' => $isPortal,
            'batches' => $batches
        ]);
    }
}
