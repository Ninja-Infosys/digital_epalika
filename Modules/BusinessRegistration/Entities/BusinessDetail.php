<?php

namespace Modules\BusinessRegistration\Entities;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use \Modules\BusinessRegistration\Enums\BusinessNature;
use Modules\BusinessRegistration\Enums\SourceOfCapital;

class BusinessDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'price',
        'business_nature',
        'proprietor_detail_id',
        'business_detail_name',
        'business_detail_name_en',
        'object_transaction_sub_category_id',
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
        'is_rent'
    ];
    protected $casts = [
        'business_nature' => BusinessNature::class,
        'source_of_capital' => SourceOfCapital::class

    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function localBody()
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

    public function objectTransactions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(ObjectTransaction::class);
    }
}
