<?php

namespace Modules\BusinessRegistration\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Support\Facades\Storage;

class BusinessRegistrationFile extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'proprietor_detail_id',
        'photo',
        'citizen_ship',
        'company_registration',
        'tax_pay_file',
        'property',
        'signature',
        'thumb'
    ];


    public function setPhotoAttribute($value)
    {
        if(!empty($value) && !is_string($value))
        {
            $this->attributes['photo'] = $value->store('business_registered/','public');
        }
    }

    public function setCitizenShipAttribute($value)
    {
        if(!empty($value) && !is_string($value))
        {
            $this->attributes['citizen_ship'] = $value->store('business_registered/','public');
        }
    }

    public function setCompanyRegistrationAttribute($value)
    {
        if(!empty($value) && !is_string($value))
        {
            $this->attributes['company_registration'] = $value->store('business_registered/','public');
        }
    }

    public function getCompanyRegistrationUrlAttribute()
    {
        return $this->attributes['company_registration'] ? Storage::disk('public')->url($this->attributes['company_registration']):'';
    }

    public function setTaxPayFileAttribute($value)
    {
        if(!empty($value) && !is_string($value))
        {
            $this->attributes['tax_pay_file'] = $value->store('business_registered/','public');
        }
    }

    public function setPropertyAttribute($value)
    {
        if(!empty($value) && !is_string($value))
        {
            $this->attributes['property'] = $value->store('business_registered/','public');
        }
    }

    public function setSignatureAttribute($value)
    {
        if(!empty($value) && !is_string($value))
        {
            $this->attributes['signature'] = $value->store('business_registered/','public');
        }
    }
    public function setThumbAttribute($value)
    {
        if(!empty($value) && !is_string($value))
        {
            $this->attributes['thumb'] = $value->store('business_registered/','public');
        }
    }


}
