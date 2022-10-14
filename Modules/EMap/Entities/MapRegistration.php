<?php

namespace Modules\EMap\Entities;

use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class MapRegistration extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'english_date',
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

    public function mapRegistrationParticulars(): BelongsTo
    {
        return $this->belongsTo(MapRegistrationParticular::class);
    }
}
