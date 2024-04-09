<?php

namespace Modules\DigitalBoard\Entities;

use App\Models\Settings\Branch;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CitizenCharter extends Model
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
     'branch_id',
     'service',
     'required_document',
     'amount',
     'time',
     'responsible_person',
     'ward',
     'user_id',
     'is_displayed',
];
    protected $casts = [
        'is_displayed' => 'boolean',
    ];
    // protected function ward(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn(string $value) => explode(',', $value),
    //         set: fn(string|array|null $value) => !empty($value) ? is_array($value) ? implode(',', $value) : $value : null,
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
    public function scopeMainPageDisplay(Builder $builder, bool $display = true): void
    {
        $builder->where('is_displayed', $display);
    }
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
