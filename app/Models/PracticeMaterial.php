<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class PracticeMaterial extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'cost',
        'link',
    ];

    protected $casts = [
        'cost' => 'decimal:2',
    ];

    // Scope for ordered materials
    public function scopeOrdered($query)
    {
        return $query->orderBy('title');
    }

    // Get formatted cost
    public function getFormattedCostAttribute()
    {
        return $this->cost == 0 ? 'Free' : '€' . number_format((float) $this->cost, 2);
    }

    // Get image URL
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            // Check if it's already a full URL
            if (filter_var($this->image, FILTER_VALIDATE_URL)) {
                return $this->image;
            }

            // Check if it starts with http (for external images)
            if (strpos($this->image, 'http') === 0) {
                return $this->image;
            }

            // Handle Backpack uploaded files
            // If the image path starts with practice_materials/, it's already the full path
            if (strpos($this->image, 'practice_materials/') === 0) {
                return asset('storage/' . $this->image);
            } else {
                // Assume it's in the practice_materials directory
                return asset('storage/practice_materials/' . $this->image);
            }
        }

        // Fallback to a default image - using a more reliable path
        return 'https://via.placeholder.com/300x200/4F46E5/FFFFFF?text=Practice+Material';
    }

    /**
     * Handle image upload using Backpack's upload functionality
     */
    public function setImageAttribute($value)
    {
        $this->uploadFileToDisk($value, 'image', 'public', 'practice_materials');
    }
}
