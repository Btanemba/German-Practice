<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class ClassSchedule extends Model
{
    use HasFactory, CrudTrait;
    protected $fillable = ['level', 'topic', 'image', 'cost', 'date', 'start_time', 'end_time'];

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "public";
        $destination_path = "class_images";

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
