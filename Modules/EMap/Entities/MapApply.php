<?php

namespace Modules\EMap\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\EMap\Enums\BuildingUsage;
use Modules\EMap\Enums\Categorization;
use Modules\EMap\Enums\TypeOfConstructionWork;

class MapApply extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'client_id',
        'registration_no',
        'registration_date',
        'construction_type',
        'usage',
        'building_category',
        'structure_type_id',
        'current_storey',
        'future_storey',
        'area_of_plinth',
        'length',
        'breadth',
        'height',
    ];

    protected $casts = [
        'construction_type' => TypeOfConstructionWork::class,
        'usage' => BuildingUsage::class,
        'building_category' => Categorization::class,
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function structureType(): BelongsTo
    {
        return $this->belongsTo(StructureType::class);
    }
}
