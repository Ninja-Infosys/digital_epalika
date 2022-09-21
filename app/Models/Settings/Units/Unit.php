<?php

namespace App\Models\Settings\Units;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'measurement_unit_id',
        'title',
        'position',
        'is_smallest',
    ];

    public function measurementUnit(): BelongsTo
    {
        return $this->belongsTo(MeasurementUnit::class);
    }

    public function conversionUnitFrom(): HasMany
    {
        return $this->hasMany(UnitConversion::class, 'conversion_from');
    }

    public function conversionUnitTo(): HasMany
    {
        return $this->hasMany(UnitConversion::class, 'conversion_to');
    }
}
