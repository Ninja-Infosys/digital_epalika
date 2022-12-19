<?php

namespace Modules\Recommendation\Entities;

use App\Models\Settings\FiscalYear;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Recommendation\Enums\ApplicationTypeEnum;

class Recommendation extends Model
{
    use HasFactory;
    use SoftDeletes;
    use EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];


    protected $fillable = [
        'fiscal_year_id',
        'date_ne',
        'date_en',
        'name',
        'application_type',
        'data',
    ];

    protected $casts = [
        'application_type' => ApplicationTypeEnum::class,
    ];

    protected function data(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value) => json_encode($value)
        );
    }

    protected function getDataInArrayAttribute()
    {
        return json_decode($this->attributes['data'], true);
    }

    public function fiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class);
    }

    public function recommendationDataForm(): HasOne
    {
        return $this->hasOne(RecommendationFormData::class);
    }
}
