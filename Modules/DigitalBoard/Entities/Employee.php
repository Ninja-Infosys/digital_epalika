<?php

namespace Modules\DigitalBoard\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'name',
        'department',
        'designation',
        'photo',
        'email',
        'phone',
        'position',
        'status',
    ];

    public function getPhotoUrlAttribute(): string
    {
        return Storage::disk('public')->url($this->attributes['photo']);
    }

    public function setPhotoAttribute($value)
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['photo'] = $value->store('employee/' . Str::slug($this->attributes['name'], '_'), 'public');
        }
    }
}
