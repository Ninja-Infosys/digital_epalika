<?php

namespace Modules\Plan\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class BudgetHead extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'budget_head_id',
        'title'
    ];

    public function budgetHead(): BelongsTo
    {
        return $this->belongsTo(BudgetHead::class);
    }

    public function budgetHeads(): HasMany
    {
        return $this->hasMany(BudgetHead::class);
    }
}
