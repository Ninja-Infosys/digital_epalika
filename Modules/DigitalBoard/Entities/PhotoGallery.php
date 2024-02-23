<?php

namespace Modules\DigitalBoard\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Support\Facades\Storage;

class PhotoGallery extends Model
{
    use HasFactory;
    use SoftDeletes;
    use EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'title',
        'image',
        'caption',
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
            get: fn (string $value) => explode(',', $value),
            set: fn (string|array|null $value) => !empty($value) ? is_array($value) ? implode(',', $value) : $value : null,
        );
    }
    public function scopeMainPageDisplay(Builder $builder, bool $display = true): void
    {
        $builder->where('is_displayed', $display);
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Storage::disk('public')->url($value),
            set: fn ($value) => $value->store('slider', 'public'),
        );
    }

}
