<?php

namespace Modules\DigitalBoard\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PopUpNotice extends Model
{
    use HasFactory;

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'title',
        'image',
        'display_duration',
        'iteration_duration',
        'is_active',
        'ward_no'
    ];

    public function getImageUrlAttribute(): string|null
    {
        return $this->attributes['image']
            ? Storage::disk('public')->url($this->attributes['image'])
            : null;
    }

    public function scopeActive(Builder $builder): void
    {
        $builder->where('is_active', 1);
    }


    public function setImageAttribute($value): void
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['image'] = $value->store('popupNotice/', 'public');
        }
    }
}
