<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegistrationNotification extends Notification
{
    use Queueable;

    protected $registration;
    protected $email;
    protected $password;

    public function __construct($registration, $email, $password)
    {
        $this->registration = $registration;
        $this->email = $email;
        $this->password = $password;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Pendaftaran Anda telah berhasil.')
                    ->line('Jumlah Pembayaran: ' . $this->registration->amount)
                    ->line('Berikut adalah detail login Anda:')
                    ->line('Email: ' . $this->email)
                    ->line('Password: ' . $this->password)
                    ->line('Terima kasih telah mendaftar!')
                    ->view('emails.registration', [
                        'registration' => $this->registration,
                        'email' => $this->email,
                        'password' => $this->password
                    ]);
    }
}
