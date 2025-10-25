<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Event;
use App\Models\Registration;

class AdminEventRegistrationNotification extends Notification
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
        $registrationCount = $this->event->getRegistrationCount();
        $remainingSpots = $this->event->getRemainingSpots();

        return (new MailMessage)
            ->subject('🎯 New Event Registration - ' . $this->event->title)
            ->greeting('Hello Admin!')
            ->line('**A new user has registered for an upcoming event!**')
            ->line('')
            ->line('**👤 User Details:**')
            ->line('**Name:** ' . $this->registration->first_name . ' ' . $this->registration->last_name)
            ->line('**Email:** ' . $this->registration->email)
            ->line('**Phone:** ' . ($this->registration->phone ?: 'Not provided'))
            ->line('**City:** ' . ($this->registration->city ?: 'Not provided'))
            ->line('**Registration Time:** ' . $this->registration->created_at->format('M d, Y H:i'))
            ->line('')
            ->line('**📅 Event Information:**')
            ->line('**Event:** ' . $this->event->title)
            ->line('**Date:** ' . $eventDate->format('l, F j, Y'))
            ->line('**Time:** ' . $eventTime)
            ->line('**Type:** ' . ucfirst($this->event->tag ?? 'Event'))
            ->line('')
            ->line('**📊 Current Registration Stats:**')
            ->line('**Total Registered:** ' . $registrationCount . '/' . $this->event->capacity)
            ->line('**Remaining Spots:** ' . $remainingSpots)
            ->line('**Capacity:** ' . round($this->event->getCapacityPercentage()) . '% full')
            ->line('')
            ->action('View Admin Panel', url('/admin'))
            ->line('')
            ->line('Event confirmation email has been sent to the user.')
            ->salutation('Sprachraum Team');
    }
}
