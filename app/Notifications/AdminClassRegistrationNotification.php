<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\ClassSchedule;
use App\Models\Registration;

class AdminClassRegistrationNotification extends Notification
{
    use Queueable;

    protected $classSchedule;
    protected $registration;

    public function __construct(ClassSchedule $classSchedule, Registration $registration)
    {
        $this->classSchedule = $classSchedule;
        $this->registration = $registration;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $totalClassRegistrations = \App\Models\Registration::where('type', 'Classes')->count();

        return (new MailMessage)
            ->subject('📚 New Class Registration - German Language Classes')
            ->greeting('Hello Admin!')
            ->line('**A new student has registered for German language classes!**')
            ->line('')
            ->line('**👤 Student Details:**')
            ->line('**Name:** ' . $this->registration->first_name . ' ' . $this->registration->last_name)
            ->line('**Email:** ' . $this->registration->email)
            ->line('**Phone:** ' . ($this->registration->phone ?: 'Not provided'))
            ->line('**City:** ' . ($this->registration->city ?: 'Not provided'))
            ->line('**Registration Time:** ' . $this->registration->created_at->format('M d, Y H:i'))
            ->line('')
            ->line('**📚 Class Information:**')
            ->line('**Level:** ' . ($this->classSchedule->level ?? 'German Language Class'))
            ->line('**Schedule:** ' . ($this->classSchedule->date ?? 'To be determined'))
            ->line('')
            ->line('**📊 Stats:**')
            ->line('**Total Class Registrations:** ' . $totalClassRegistrations)
            ->line('')
            ->action('View Admin Panel', url('/admin'))
            ->line('')
            ->line('Class confirmation email has been sent to the student.')
            ->salutation('Sprachraum Team');
    }
}
