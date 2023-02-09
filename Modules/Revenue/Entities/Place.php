<?php

namespace Modules\Revenue\Entities;

use App\Models\Settings\Units\Unit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class Place extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'sector_id',
        'title',
        'ward',
        'rate',
        'unit_id',
    ];

    public function sector(): BelongsTo
    {
        return $this->belongsTo(Sector::class);
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }
}
