<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Subscriber;

class AdminSubscriptionNotification extends Notification
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
        $totalSubscribers = \App\Models\Subscriber::where('subscribed', true)->count();

        return (new MailMessage)
            ->subject('📬 New Newsletter Subscription')
            ->greeting('Hello Admin!')
            ->line('**A new user has subscribed to the newsletter!**')
            ->line('')
            ->line('**👤 Subscriber Details:**')
            ->line('**Email:** ' . $this->subscriber->email)
            ->line('**Subscription Time:** ' . $this->subscriber->created_at->format('M d, Y H:i'))
            ->line('**Status:** Active ✅')
            ->line('')
            ->line('**📊 Newsletter Stats:**')
            ->line('**Total Active Subscribers:** ' . $totalSubscribers)
            ->line('')
            ->action('View Admin Panel', url('/admin'))
            ->line('')
            ->line('Welcome email has been sent to the new subscriber.')
            ->salutation('Sprachraum Team');
    }
}
