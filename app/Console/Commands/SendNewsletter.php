<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;

class SendNewsletter extends Command
{
    protected $signature = 'newsletter:send {subject} {message}';
    protected $description = 'Send an email to all active subscribers';

    public function handle()
    {
        $subscribers = Subscriber::where('subscribed', true)->get();
        foreach ($subscribers as $subscriber) {
            Mail::raw($this->argument('message'), function ($mail) use ($subscriber) {
                $mail->to($subscriber->email)
                     ->subject($this->argument('subject'));
            });
        }
        $this->info('Emails sent successfully to active subscribers.');
    }
}
