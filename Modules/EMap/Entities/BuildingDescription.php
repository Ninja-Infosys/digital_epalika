<?php

namespace Modules\EMap\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\EMap\Enums\NeighbourTypeEnum;

class BuildingDescription extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'building_documentation_id',
        'has_road',
        'direction',
        'has_window',
        'minimum_distance_to_leave',
        'leave',
        'remarks',
    ];
    protected $casts = [
        'direction' => NeighbourTypeEnum::class,
    ];


    public function buildingDocumentation(): BelongsTo
    {
        return $this->belongsTo(BuildingDocumentation::class);
    }
}
