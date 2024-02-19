<?php

namespace Modules\DigitalBoard\Entities;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;

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
        'ward',
        'user_id',
        'is_displayed',
    ];

    protected $casts = [
        'is_displayed' => 'boolean',
        
    ];
    protected function ward(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => explode(',', $value),
            set: fn(string|array|null $value) => !empty($value) ? is_array($value) ? implode(',', $value) : $value : null,
        );
    }
    public function scopeMainPageDisplay(Builder $builder, bool $display = true): void
    {
        $builder->where('is_displayed', $display);
    }

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
