<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Registration extends Model
{
    use HasFactory, CrudTrait;
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'city', 'type', 'hangout_id', 'class_schedule_id'
    ];

    public function hangout()
    {
        return $this->belongsTo(Hangout::class);
    }

    public function classSchedule()
    {
        return $this->belongsTo(ClassSchedule::class);
    }

    public function user()
{
    return $this->belongsTo(\App\Models\User::class, 'user_id');
}
}
