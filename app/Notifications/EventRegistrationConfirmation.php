<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Event;
use App\Models\Registration;

class EventRegistrationConfirmation extends Notification
{
    use Queueable;

    protected $event;
    protected $registration;

    public function __construct(Event $event, Registration $registration)
    {
        $this->event = $event;
        $this->registration = $registration;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $eventDate = \Carbon\Carbon::parse($this->event->event_date);
        $eventTime = $this->event->event_time ? \Carbon\Carbon::parse($this->event->event_time)->format('H:i') : 'TBA';

        return (new MailMessage)
            ->subject('🎉 Thank You for Registering - ' . $this->event->title)
            ->greeting('Hello ' . $this->registration->first_name . '!')
            ->line('**Thank you so much for registering for our upcoming event!**')
            ->line('We are absolutely thrilled to have you join us and look forward to meeting you soon! 😊')
            ->line('')
            ->line('**📅 Event Details:**')
            ->line('**Event:** ' . $this->event->title)
            ->line('**Date:** ' . $eventDate->format('l, F j, Y'))
            ->line('**Time:** ' . $eventTime)
            ->line('**Type:** ' . ucfirst($this->event->tag ?? 'Event'))
            ->line('')
            ->line('**What to Expect:**')
            ->line($this->event->description ?? 'Join us for an amazing experience.')
            ->line('')
            ->line('**Quick Reminders:**')
            ->line('• Please arrive 10-15 minutes early')
            ->line('• Bring your enthusiasm and don\'t worry about making mistakes!')
            ->line('• Feel free to ask questions - we\'re here to help you learn')
            ->line('• If you need to cancel, please let us know as soon as possible')
            ->line('')
            ->action('Visit Our Website', url('/'))
            ->line('')
            ->line('')
            ->line('**Bis bald!** (See you soon!)')
            ->line('Sprachraum Team 🇩🇪')
            ->salutation('Happy Learning!');
    }
}
