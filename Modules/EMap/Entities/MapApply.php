<?php

namespace Modules\EMap\Entities;

use App\Models\Settings\FiscalYear;
use App\Models\Settings\Units\Unit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
        'fiscal_year_id',
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
        'organization_id'
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

    public function fiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class);
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function landDetail(): HasOne
    {
        return $this->hasOne(LandDetail::class);
    }

    public function landOwner(): HasOne
    {
        return $this->hasOne(LandOwner::class);
    }

    public function houseOwner(): HasOne
    {
        return $this->hasOne(HouseOwner::class);
    }

    public function storeyDetails(): HasMany
    {
        return $this->hasMany(StoreyDetail::class);
    }

    public function fourForts(): HasMany
    {
        return $this->hasMany(FourFort::class);
    }

    public function designerDetails(): HasMany
    {
        return $this->hasMany(DesignerDetail::class);
    }

    public function applicantDetail(): HasOne
    {
        return $this->hasOne(ApplicantDetail::class);
    }

    public function criteriaDetails(): HasMany
    {
        return $this->hasMany(CriteriaDetail::class);
    }

    public function buildingDetails(): HasMany
    {
        return $this->hasMany(BuildingDetail::class);
    }
}
