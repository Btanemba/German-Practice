<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ChatMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $userName;
    public $userEmail;
   public $userMessage;
    public $page;

    /**
     * Create a new message instance.
     */
    public function __construct($userName, $userEmail, $messageContent, $page)
    {
        $this->userName = $userName;
        $this->userEmail = $userEmail;
        $this->messageContent = $userMessage;
        $this->page = $page;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('New Chat Message from Website')
                    ->view('emails.chat-message')
                    ->with([
                        'userName' => $this->userName,
                        'userEmail' => $this->userEmail,
                        'messageContent' => $this->userMessage, 
                        'page' => $this->page,
                        'timestamp' => now()->format('M d, Y H:i')
                    ]);
    }
}
