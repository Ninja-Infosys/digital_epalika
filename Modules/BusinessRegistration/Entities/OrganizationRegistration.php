<?php

namespace Modules\BusinessRegistration\Entities;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\File;
use App\Models\Settings\FiscalYear;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OrganizationRegistration extends Model
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
        'reg_no',
        'submission_no',
        'fiscal_year_id',
        'registration_no',
        'registration_date_ne',
        'registration_date_en',
        'name',
        'name_en',
        'address',
        'address_en',
        'purpose',
        'province_id',
        'district_id',
        'local_body_id',
        'ward_no',
        'way',
        'tole',
        'financial_source',
        'application_date',
        'application_date_en',
        'ward_recommendation',
        'bill_no',
        'bill_date_bs',
        'bill_date_ad',
        'taxpayer_number',
        'amount',
        'statute',
        'other_file',
        ];

    protected $appends = [
        'is_register',
        'registration_month'
    ];


    public function fiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class);
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function localBody(): BelongsTo
    {
        return $this->belongsTo(LocalBody::class);
    }

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'model');
    }

    public function setWardRecommendationAttribute($value): void
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['ward_recommendation'] = $value->store('organization_registration/' . Str::slug($this->attributes['name_en']), 'public');
        }
    }

    public function getWardRecommendationAttribute(): string
    {
        return $this->attributes['ward_recommendation'] ? Storage::disk('public')->url($this->attributes['ward_recommendation']) : '';
    }

    public function setStatuteAttribute($value): void
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['statute'] = $value->store('organization_registration/' . Str::slug($this->attributes['name_en']), 'public');
        }
    }

    public function getStatuteAttribute(): string
    {
        return $this->attributes['statute'] ? Storage::disk('public')->url($this->attributes['statute']) : '';
    }


    public function getRegistrationMonthAttribute(): string
    {
        return explode('-', $this->registration_date_ne)[1] ?? '';
    }

    public function committee(): HasMany
    {
        return $this->hasMany(CommitteeName::class)->orderBy('position');
    }
    public function otherFile(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => !empty($value) ? Storage::url($value) : null,
            set: fn ($value) => (!empty($value) && !is_string($value))
                ? $value->store('other_file', 'public')
                : null
        );
    }

    public function committeeNames(): HasMany
    {
        return $this->hasMany(CommitteeName::class);
    }
}
