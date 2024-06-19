<?php

namespace Modules\EMap\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Modules\EMap\Enums\StoreyTypeEnum;

class BuildingStoreyDetail extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'building_documentation_id',
        'storey',
        'area_of_former_construction',
        'land_area',
        'remarks',
    ];

    protected $casts = [
        'storey' => StoreyTypeEnum::class,
    ];
    public function buildingDocumentation(): BelongsTo
    {
        return $this->belongsTo(BuildingDocumentation::class);
    }
}
