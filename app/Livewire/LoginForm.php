<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class LoginForm extends Component
{
    public $email;
    public $password;
    public $title = 'Kaashir - Login Form';

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function login()
    {
        $this->validate();

        try {
            // Call the external API using Laravel's HTTP client
            $url = env('LOGIN_API_URL');
            $response = Http::asForm()->post($url.'/login', [
                'email' => $this->email,
                'password' => $this->password,
            ]);


            // Check for successful response
            if ($response->successful()) {
                // Handle successful login
                session()->flash('message', 'Login successful!');
                // Optionally redirect or store token/data as needed
            } else {
                session()->flash('error', 'Login failed: ' . $response->body());
            }
        } catch (\Exception $e) {
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.login-form')
        ->layout('components.layouts.app', ['title' => $this->title, 'isPortal' => false]);
    }
}
