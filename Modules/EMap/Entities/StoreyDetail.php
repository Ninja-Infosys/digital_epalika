<?php

namespace Modules\EMap\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class StoreyDetail extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'map_apply_id',
        'storey',
        'area_of_proposed_construction',
        'area_of_former_construction',
        'total_area',
        'height',
    ];

    public function mapApply(): BelongsTo
    {
        return $this->belongsTo(MapApply::class);
    }
}
