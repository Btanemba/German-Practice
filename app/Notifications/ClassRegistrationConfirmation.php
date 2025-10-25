<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\ClassSchedule;
use App\Models\Registration;

class ClassRegistrationConfirmation extends Notification
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
        return (new MailMessage)
            ->subject('📚 Welcome to German Classes - Registration Confirmed!')
            ->greeting('Guten Tag ' . $this->registration->first_name . '!')
            ->line('**Thank you for registering for our German language classes!**')
            ->line('We are excited to have you join our learning community and look forward to meeting you! 🎓')
            ->line('')
            ->line('**📚 Class Details:**')
            ->line('**Level:** ' . ($this->classSchedule->level ?? 'German Language Class'))
            ->line('**Schedule:** ' . ($this->classSchedule->schedule ?? 'Will be confirmed soon'))
            ->line('**Status:** Registration Confirmed ✅')
            ->line('')
            ->line('**What to Bring to Your First Class:**')
            ->line('• A notebook and pen for taking notes')
            ->line('• Your enthusiasm to learn German!')
            ->line('• Any previous German learning materials (optional)')
            ->line('• Questions you\'d like to ask about the German language')
            ->line('')
            ->line('**What You Can Expect:**')
            ->line('• Interactive lessons with experienced instructor')
            ->line('• Practice speaking, listening, reading, and writing')
            ->line('• A supportive environment where mistakes are part of learning')
            ->line('• Cultural insights about German-speaking countries')
            ->line('• Regular progress assessments to track your improvement')
            ->line('')
            ->action('Visit Our Website', url('/'))
            ->line('')
            ->line('We believe that learning German opens doors to new opportunities and experiences.')
            ->line('Our team is committed to making your learning journey enjoyable and effective!')
            ->line('')
            ->line('**Viel Erfolg beim Lernen!** (Good luck with your learning!)')
            ->line('The German Practice Team 🇩🇪')
            ->salutation('Auf Wiedersehen!');
    }
}
