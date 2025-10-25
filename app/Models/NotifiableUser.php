<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;

class NotifiableUser
{
    use Notifiable;

    public $email;
    public $name;

    public function __construct($email, $name = null)
    {
        $this->email = $email;
        $this->name = $name ?: 'User';
    }

    /**
     * Route notifications for the mail channel.
     *
     * @return string
     */
    public function routeNotificationForMail()
    {
        return $this->email;
    }

    /**
     * Get the display name for notifications.
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->name;
    }
}
