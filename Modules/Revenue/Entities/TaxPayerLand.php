<?php

namespace Modules\Revenue\Entities;

use App\Models\Settings\Units\Unit;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class TaxPayerLand extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'user_id',
        'tax_payer_id',
        'plot_no',
        'former_ward',
        'former_vdc',
        'ward_no',
        'area',
        'area_unit_id',
        'sector_id',
        'place_id',
        'land_address',
        'land_use',
        'remarks',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function taxPayer(): BelongsTo
    {
        return $this->belongsTo(TaxPayer::class);
    }

    public function areaUnit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'area_unit_id');
    }

    public function sector(): BelongsTo
    {
        return $this->belongsTo(Sector::class);
    }

    public function place(): BelongsTo
    {
        return $this->belongsTo(Place::class);
    }

}
