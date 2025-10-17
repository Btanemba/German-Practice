<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Event extends Model
{
    use CrudTrait,HasFactory;
    protected $fillable = ['title', 'image', 'event_date', 'tag'];
    protected $appends = ['days_remaining'];
    protected $casts = ['event_date' => 'date'];

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "public";
        $destination_path = "events";

        // if the image was erased
        if ($value == null) {
            Storage::disk($disk)->delete($this->{$attribute_name});
            $this->attributes[$attribute_name] = null;
            return;
        }

        // if a base64 was sent, or if it's an UploadedFile instance
        if (is_file($value) && $value->isValid()) {
            // generate a filename and store the file
            $path = $value->store($destination_path, $disk);
            $this->attributes[$attribute_name] = $path;
        }
    }


}
