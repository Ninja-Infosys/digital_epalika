<?php

namespace Modules\EMap\Entities;

use App\Models\Settings\Units\Unit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\EMap\Enums\BuildingUsageEnum;
use Modules\EMap\Enums\CategorizationEnum;
use Modules\EMap\Enums\TypeOfConstructionWorkEnum;

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
        'land_use_area',
        'ward_no',
        'former_ward_no',
        'tole',
        'street_code_no',
        'plot_no',
        'bigha',
        'kattha',
        'dhur',
        'square_meter',
        'percentage_of_area_covered_by_building',
        'unit_id',
    ];

    protected $casts = [
        'construction_type' => TypeOfConstructionWorkEnum::class,
        'usage' => BuildingUsageEnum::class,
        'building_category' => CategorizationEnum::class,
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function structureType(): BelongsTo
    {
        return $this->belongsTo(StructureType::class);
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function landOwners(): HasMany
    {
        return $this->hasMany(LandOwner::class);
    }
}
