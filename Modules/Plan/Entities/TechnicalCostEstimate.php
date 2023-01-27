<?php

namespace Modules\Plan\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class TechnicalCostEstimate extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'project_id',
        'detail',
        'number',
        'length',
        'breadth',
        'height',
        'quantity',
        'unit',
        'rate'
    ];

    protected $appends = [
        'amount'
    ];

    public function getAmountAttribute(): float|int
    {
        return $this->quantity * $this->rate;
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
