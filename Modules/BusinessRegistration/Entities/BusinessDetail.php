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
use Illuminate\Database\Eloquent\SoftDeletes;
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
    ];

    protected $casts = [
        'business_nature' => BusinessNature::class,
        'source_of_capital' => SourceOfCapital::class,

    ];

    public function scopeFilterData($query, $param = [])
    {
        if (!empty($param['from_date'])) {
            $query->whereDate('registration_date_ne', '>=', $param['from_date']);
        }
        if (!empty($param['to_date'])) {
            $query->whereDate('registration_date_ne', '<=', $param['to_date']);
        }
        if (!empty($param['fiscal_year'])) {
            $query->where('fiscal_year_id', $param['fiscal_year']);
        }
        if (!empty($param['business_nature'])) {
            $query->where('business_nature', $param['business_nature']);
        }
//        if (!empty($param['business_purpose'])){
//            $query->where('registration_date_ne',$param['business_purpose']);
//        }
//        if (!empty($param['object_transaction'])){
//            $query->where('registration_date_ne',$param['object_transaction']);
//        }
        if (!empty($param['investment_revenue'])) {
            $query->whereDate('investment_revenue_id', $param['investment_revenue']);
        }
        if (!empty($param['registration_renewal'])) {
            $query->where('business_nature', $param['registration_renewal']);
        }
        if (!empty($param['investment'])) {
            $query->where('amount_cost', $param['investment']);
        }
        if (!empty($param['employment'])) {
            $query->where('employment', $param['employment']);
        }
        if (!empty($param['business_year'])) {
            $query->where('establish_year', $param['business_year']);
        }

        if (!empty($param['introboard'])) {
            $query->whereHas('proprietorDetail.introboard', function ($subQuery) use ($param) {
                $subQuery->where('length', 'like', '%' . $param['introboard'] . '%');
                $subQuery->orWhere('width', 'like', '%' . $param['introboard'] . '%');
                $subQuery->orWhere('square', 'like', '%' . $param['introboard'] . '%');
            });
        }

        return $query;
    }

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

    public function proprietorDetail(): BelongsTo
    {
        return $this->belongsTo(ProprietorDetail::class);
    }
}
