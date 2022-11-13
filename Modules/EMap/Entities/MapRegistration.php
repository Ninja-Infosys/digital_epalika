<?php

namespace Modules\EMap\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class MapRegistration extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'map_apply_id',
        'form_receipt',
        'application_registration_fee',
        'other',
        'nepali_date',
        'english_date',
        'receipt_no',
        'recipient',
    ];

    public function mapApply(): BelongsTo
    {
        return $this->belongsTo(MapApply::class);
    }

    public function getParticularTotalRateAttribute()
    {
        return $this->mapRegistrationParticulars->sum('rate') ?? 0;
    }

    public function getParticularTotalAreaAttribute()
    {
        return $this->mapRegistrationParticulars->sum('area') ?? 0;
    }

    public function getParticularTotalAmountAttribute()
    {
        return $this->mapRegistrationParticulars->sum('amount') ?? 0;
    }

    public function getTotalAmountAttribute()
    {
        return $this->attributes['form_receipt'] + $this->attributes['application_registration_fee'] + $this->attributes['other'] + $this->getParticularTotalAmountAttribute();
    }

    public function mapRegistrationParticulars(): HasMany
    {
        return $this->hasMany(MapRegistrationParticular::class);
    }
}
