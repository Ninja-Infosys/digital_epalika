<?php

namespace Modules\DigitalBoard\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'video',
        'ward',
        'is_displayed',
        'user_id'
    ];

    protected $casts = [
        'is_displayed' => 'boolean'
    ];

    public function scopeMainPageDisplay(Builder $builder, bool $display = true): void
    {
        $builder->where('is_displayed', $display);
    }

    // protected function ward(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn (string $value) => explode(',', $value),
    //         set: fn (string|array|null $value) => !empty($value) ? is_array($value) ? implode(',', $value) : $value : null,
    //     );
    // }
    protected function ward(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                return $value !== null ? explode(',', $value) : [];
            },
            set: function ($value) {
                if (is_array($value)) {
                    return implode(',', $value);
                }
                return $value;
            }
        );
    }
}
