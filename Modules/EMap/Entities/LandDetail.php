<?php

namespace Modules\EMap\Entities;

use App\Models\Settings\Units\Unit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class LandDetail extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'map_apply_id',
        'land_use_area',
        'ward_no',
        'former_ward_no',
        'tole',
        'street_code_no',
        'plot_no',
        'percentage_of_area_covered_by_building',
        'unit_id',
        'unit_value'
    ];

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }
    public function mapApply(): BelongsTo
    {
        return $this->belongsTo(MapApply::class);
    }
}
