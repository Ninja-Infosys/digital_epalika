<?php

namespace App\Models\Website;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Slider extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'title',
        'image',
        'description',
    ];

    public function getImageUrlAttribute(): string
    {
        return Storage::disk('public')->url($this->attributes['image']);
    }

    public function setImageAttribute($value)
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['image'] = $value->store('slider', 'public');
        }
    }
}
