<?php

namespace Modules\BusinessRegistration\Entities;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\File;
use App\Models\Settings\FiscalYear;
use App\Traits\GetAllColumns;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Modules\BusinessRegistration\Enums\BusinessTypeEnum;
use Modules\BusinessRegistration\Enums\SourceOfCapital;
use Modules\BusinessRegistration\Traits\BusinessDetailTemplateTrait;
use function _\get;

class BusinessDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    use GetAllColumns;

//    use BusinessDetailTemplateTrait;

    protected $fillable = [
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
        'business_nature_id',
        'object_transaction_id',
        'working_capital',
        'fixed_capital',
        'investment',
        'is_rent',
        'house_owner_name',
        'house_owner_phone',
        'house_owner_address',
        'house_owner_monthly_rent',
        'length',
        'width',
        'application_date',
        'application_date_en',
        'rent_agreement',
        'land_ownership_certificate',
        'ward_recommendation',
        'embassy_document',
        'registration_document',
        'license',
        'tax_document',
        'application_fee',
        'registration_fee',
        'business_tax',
        'introduction_board_fees',
        'fine',
        'taxpayer_number'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
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

    public function businessNature(): BelongsTo
    {
        return $this->belongsTo(BusinessNature::class);
    }


    public function objectTransaction(): BelongsTo
    {
        return $this->belongsTo(ObjectTransaction::class);
    }

    public function SourceOfCapital(): Attribute
    {
        return Attribute::get(fn($value) => SourceOfCapital::tryFrom($value)?->label() ?? null);
    }

    public function BusinessType(): Attribute
    {
        return Attribute::get(fn($value) => BusinessTypeEnum::tryFrom($value)?->label() ?? null);
    }


    public function investmentRevenue(): BelongsTo
    {
        return $this->belongsTo(InvestmentRevenue::class);
    }

    public function registeredBusinesses(): HasMany
    {
        return $this->hasMany(RegisteredBusiness::class);
    }

    public function partners(): HasMany
    {
        return $this->hasMany(Partner::class)->orderBy('position');
    }

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'model');
    }

    public function rentAgreement(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Storage::url($value),
            set: fn($value) => (!empty($value) && !is_string($value))
                ? $value->store('business_registration/' . Str::slug($this->attributes['name_en']), 'public')
                : null
        );
    }

    public function landOwnershipCertificate(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Storage::url($value),
            set: fn($value) => (!empty($value) && !is_string($value))
                ? $value->store('business_registration/' . Str::slug($this->attributes['name_en']), 'public')
                : null
        );
    }

    public function wardRecommendation(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Storage::url($value),
            set: fn($value) => (!empty($value) && !is_string($value))
                ? $value->store('business_registration/' . Str::slug($this->attributes['name_en']), 'public')
                : null
        );
    }


    public function embassyDocument(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Storage::url($value),
            set: fn($value) => (!empty($value) && !is_string($value))
                ? $value->store('business_registration/' . Str::slug($this->attributes['name_en']), 'public')
                : null
        );
    }

    public function registrationDocument(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Storage::url($value),
            set: fn($value) => (!empty($value) && !is_string($value))
                ? $value->store('business_registration/' . Str::slug($this->attributes['name_en']), 'public')
                : null
        );
    }

    public function license(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Storage::url($value),
            set: fn($value) => (!empty($value) && !is_string($value))
                ? $value->store('business_registration/' . Str::slug($this->attributes['name_en']), 'public')
                : null
        );
    }

    public function taxDocument(): Attribute
    {

        return Attribute::make(
            get: fn($value) => Storage::url($value),
            set: fn($value) => (!empty($value) && !is_string($value))
                ? $value->store('business_registration/' . Str::slug($this->attributes['name_en']), 'public')
                : null
        );
    }

    public function getAreaAttribute(): float|int
    {
        return $this->attributes['length'] * $this->attributes['width'];

    }

}
