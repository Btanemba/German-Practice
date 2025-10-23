<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Registration;

class ClientEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $registration;
    public $emailSubject;
    public $emailMessage;

    public function __construct(Registration $registration, $subject, $message)
    {
        $this->registration = $registration;
        $this->emailSubject = $subject;
        $this->emailMessage = $message;
    }

    public function build()
    {
        return $this->subject($this->emailSubject)
                    ->view('emails.client_email');
    }
}
