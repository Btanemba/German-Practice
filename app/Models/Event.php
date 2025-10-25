<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Event extends Model
{
   use HasFactory, CrudTrait;

    protected $fillable = [
        'title',
        'description',
        'event_date',
        'tag',
        'image',
        'capacity',
        'event_time'
    ];

    protected $casts = [
        'event_date' => 'date',
        'event_time' => 'string',
    ];

    // Count registrations based on event title
    public function getRegistrationCount()
    {
        $title = trim(strtolower($this->title));

        // Add debug logging
        \Log::info("Checking registrations for event: '{$title}'");

        if ($title === 'coffee-connect' || $title === 'hangout') {
            $count = \App\Models\Registration::where('type', 'Hangout')->count();
            \Log::info("Found {$count} Hangout registrations");
            return $count;
        } elseif ($title === 'classes') {
            $count = \App\Models\Registration::where('type', 'Classes')->count();
            \Log::info("Found {$count} Classes registrations");
            return $count;
        }

        \Log::info("No matching title, returning 0");
        return 0;
    }

    public function getRemainingSpots()
    {
        return max(0, $this->capacity - $this->getRegistrationCount());
    }

    public function isFull()
    {
        $isFull = $this->getRegistrationCount() >= $this->capacity;
        \Log::info("Event '{$this->title}' - Capacity: {$this->capacity}, Registered: {$this->getRegistrationCount()}, Is Full: " . ($isFull ? 'YES' : 'NO'));
        return $isFull;
    }

    public function getCapacityPercentage()
    {
        if ($this->capacity == 0) return 0;
        return ($this->getRegistrationCount() / $this->capacity) * 100;
    }

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "public";
        $destination_path = "events";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }

    public function uploadFileToDisk($value, $attribute_name, $disk, $destination_path)
    {
        if (!empty($value)) {
            // If a new file is uploaded
            if (is_file($value)) {
                $filename = time() . '_' . $value->getClientOriginalName();
                $filePath = $value->storeAs($destination_path, $filename, $disk);
                $this->attributes[$attribute_name] = $filePath;
            } else {
                // If it's already a path, keep it as is
                $this->attributes[$attribute_name] = $value;
            }
        }
    }
}
