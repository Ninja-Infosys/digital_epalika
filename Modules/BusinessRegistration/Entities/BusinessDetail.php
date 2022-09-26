<?php

namespace Modules\BusinessRegistration\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class BusinessDetail extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'proprietor_detail_id',
        'business_detail_name',
        'business_detail_en',
        'business_nature_id',
        'establish_year',
        'registration_date',
        'pan_no',
        'transaction_object',
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
        'length',
        'width',
        'square_feet',
    ];


    public function partnerDetails(): HasMany
    {
        return $this->hasMany(PartnerDetail::class);
    }

    public function registeredBusinesses(): HasMany
    {
        return $this->hasMany(RegisteredBusiness::class);
    }
}
