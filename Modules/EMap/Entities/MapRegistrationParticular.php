<?php

namespace Modules\EMap\Entities;

use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class MapRegistrationParticular extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'map_registration_id',
        'map_fee',
        'area_of_proposed_construction',
        'rate',
        'remarks',
    ];

    public function mapRegistration(): BelongsTo
    {
        return $this->belongsTo(MapRegistration::class);
    }
}
