<?php

namespace Modules\BusinessRegistration\Entities;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\Settings\FiscalYear;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Modules\BusinessRegistration\Enums\BusinessNature;
use Modules\BusinessRegistration\Enums\SourceOfCapital;

class BusinessDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [

        'business_type',
        'business_nature',
        'proprietor_detail_id',
        'business_detail_name',
        'business_detail_name_en',
        'investment_revenue_id',
        'business_nature_id',
        'establish_year',
        'registration_date',
        'pan_no',
        'amount_cost',
        'source_of_capital',
        'purpose',
        'employment',
        'house_owner_name',
        'house_owner_phone',
        'house_owner_address',
        'house_owner_monthly_rent',
        'province_id',
        'district_id',
        'local_body_id',
        'ward_no',
        'way',
        'tole',
        'submission_no',
        'is_registered',
        'is_rent',
        'fiscal_year_id',
        'registration_no',
        'registration_date_ne',
        'registration_date_en',
        'photo',
        'citizenship_front',
        'citizenship_back',
        'company_registration',
        'tax_pay_file',
        'property',
        'signature',
        'thumb',
        'length',
        'width',
        'square',
        'application_fee',
        'registration_fee',
        'business_tax',
        'introduction_board_fees',
        'fine'
    ];

    protected $casts = [
        'business_nature' => BusinessNature::class,
        'source_of_capital' => SourceOfCapital::class,

    ];



    public function fiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class);
    }

    public function investmentRevenue(): BelongsTo
    {
        return $this->belongsTo(InvestmentRevenue::class);
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

    public function partnerDetails(): HasMany
    {
        return $this->hasMany(PartnerDetail::class);
    }

    public function registeredBusinesses(): HasMany
    {
        return $this->hasMany(RegisteredBusiness::class);
    }

    public function businessPurposes(): BelongsToMany
    {
        return $this->belongsToMany(BusinessPurpose::class);
    }

    public function proprietorDetail(): HasOne
    {
        return $this->hasOne(ProprietorDetail::class);
    }

    public function printedData(): HasMany
    {
        return $this->hasMany(PrintedData::class);
    }


    public function setPhotoAttribute($value): void
    {
        if (! empty($value) && ! is_string($value)) {
            $this->attributes['photo'] = $value->store('business_registered/', 'public');
        }
    }
    public function setSquareAttribute($value): void
    {
       $this->attributes['square'] = $this->attributes['length'] * $this->attributes['width'];
    }

    public function getPhotoUrlAttribute(): string
    {
        return $this->attributes['photo'] ? Storage::disk('public')->url($this->attributes['photo']) : '';
    }

    public function setCitizenshipFrontAttribute($value): void
    {
        if (! empty($value) && ! is_string($value)) {
            $this->attributes['citizenship_front'] = $value->store('business_registered/', 'public');
        }
    }

    public function getCitizenshipFrontUrlAttribute(): string
    {
        return $this->attributes['citizenship_front'] ? Storage::disk('public')->url($this->attributes['citizenship_front']) : '';
    }

    public function setCitizenshipBackAttribute($value): void
    {
        if (! empty($value) && ! is_string($value)) {
            $this->attributes['citizenship_back'] = $value->store('business_registered/', 'public');
        }
    }

    public function getCitizenshipBackUrlAttribute(): string
    {
        return $this->attributes['citizenship_back'] ? Storage::disk('public')->url($this->attributes['citizenship_back']) : '';
    }

    public function setCompanyRegistrationAttribute($value): void
    {
        if (! empty($value) && ! is_string($value)) {
            $this->attributes['company_registration'] = $value->store('business_registered/', 'public');
        }
    }

    public function getCompanyRegistrationUrlAttribute(): string
    {
        return $this->attributes['company_registration'] ? Storage::disk('public')->url($this->attributes['company_registration']) : '';
    }

    public function setTaxPayFileAttribute($value): void
    {
        if (! empty($value) && ! is_string($value)) {
            $this->attributes['tax_pay_file'] = $value->store('business_registered/', 'public');
        }
    }

    public function getTaxPayFileUrlAttribute(): string
    {
        return $this->attributes['tax_pay_file'] ? Storage::disk('public')->url($this->attributes['tax_pay_file']) : '';
    }

    public function setPropertyAttribute($value): void
    {
        if (! empty($value) && ! is_string($value)) {
            $this->attributes['property'] = $value->store('business_registered/', 'public');
        }
    }

    public function getPropertyUrlAttribute(): string
    {
        return $this->attributes['property'] ? Storage::disk('public')->url($this->attributes['property']) : '';
    }

    public function setSignatureAttribute($value): void
    {
        if (! empty($value) && ! is_string($value)) {
            $this->attributes['signature'] = $value->store('business_registered/', 'public');
        }
    }

    public function getSignatureUrlAttribute(): string
    {
        return $this->attributes['signature'] ? Storage::disk('public')->url($this->attributes['signature']) : '';
    }

    public function setThumbAttribute($value): void
    {
        if (! empty($value) && ! is_string($value)) {
            $this->attributes['thumb'] = $value->store('business_registered/', 'public');
        }
    }

    public function getThumbUrlAttribute(): string
    {
        return $this->attributes['thumb'] ? Storage::disk('public')->url($this->attributes['thumb']) : '';
    }

    public function getTotalAmountAttribute()
    {
        return $this->application_fee + $this->registration_fee + $this->business_tax + $this->introduction_board_fees + $this->fine;
    }


}
