<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Subscriber;

class SubscriptionConfirmation extends Notification
{
    use Queueable;

    protected $subscriber;

    public function __construct(Subscriber $subscriber)
    {
        $this->subscriber = $subscriber;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('📬 Welcome to German Practice Newsletter!')
            ->greeting('Hallo there!')
            ->line('**Thank you for subscribing to our newsletter!**')
            ->line('We\'re thrilled to have you as part of our German learning community! 🎉')
            ->line('')
            ->line('**What you can expect from us:**')
            ->line('• Weekly German learning tips and tricks')
            ->line('• Updates about upcoming events and classes')
            ->line('• Exclusive content for newsletter subscribers')
            ->line('• German cultural insights and fun facts')
            ->line('• Special offers and early registration access')
            ->line('')
            ->line('**Stay Connected:**')
            ->line('Follow our learning journey and never miss an opportunity to improve your German!')
            ->line('')
            ->action('Visit Our Website', url('/'))
            ->line('')
            ->line('We look forward to supporting you on your German learning adventure!')
            ->line('')
            ->line('**Willkommen!** (Welcome!)')
            ->line('Sprachraum Team 🇩🇪')
            ->salutation('Happy Learning!');
    }
}
