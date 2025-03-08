<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;
use App\Models\Payment;
use App\Models\Registration;

class PrintStudentCard extends Component
{
    public $student;
    public $payment_status;

    public function mount($id)
    {
        $this->student = Student::with('studentRegistration')->findOrFail($id);
    }

    public function render()
    {
        $student_registration = $this->student->studentRegistration;

        $registration = Registration::where('id', $student_registration->registration_id)->first();

        $this->payment_status = Payment::where('registration_id', $registration->id)->value('status') ?? 'Not Paid';

        return view('livewire.print-student-card', [
            'student' => $this->student,
            'student_registration' => $student_registration,
            'payment_status' => $this->payment_status
        ])->layout('components.layouts.app', [
            'title' => 'Profile Page',
            'isPortal' => false,
        ]);
    }
}
