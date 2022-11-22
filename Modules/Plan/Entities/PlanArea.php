<?php

namespace Modules\Plan\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class PlanArea extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'plan_area_id',
        'area_name'
    ];

    public function planArea(): BelongsTo
    {
        return $this->belongsTo(PlanArea::class);
    }

    public function planAreas(): HasMany
    {
        return $this->hasMany(PlanArea::class);
    }
}
