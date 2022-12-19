<?php

namespace App\Models;

use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ListRegistration extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'registration_no',
        'applicant_type',
        'name',
        'address',
        'mailing_address',
        'main_person',
        'telephone',
        'mobile_no',
        'application_photo',
        'registration_certificate',
        'pan_photo',
        'tax_payment_certificate',
        'license_photo',
        'business_nature',
        'business_nature_description',
        'date',
    ];

    public function getApplicationPhotoUrlAttribute(): string
    {
        return $this->attributes['application_photo'] ?
            Storage::disk('public')->url($this->attributes['application_photo']) : '';
    }

    public function setApplicationPhotoAttribute($value)
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['application_photo'] = $value->store('list_registration/' . Str::slug($this->attributes['main_person'], '_') . '/application', 'public');
        }
    }

    public function getRegistrationCertificateUrlAttribute(): string
    {
        return $this->attributes['registration_certificate'] ?
            Storage::disk('public')->url($this->attributes['registration_certificate']) : '';
    }

    public function setRegistrationCertificateAttribute($value)
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['registration_certificate'] = $value->store('list_registration/' . Str::slug($this->attributes['main_person'], '_') . '/registration_certificate', 'public');
        }
    }

    public function getPanPhotoUrlAttribute(): string
    {
        return $this->attributes['pan_photo'] ?
            Storage::disk('public')->url($this->attributes['pan_photo']) : '';
    }

    public function setPanPhotoAttribute($value)
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['pan_photo'] = $value->store('list_registration/' . Str::slug($this->attributes['main_person'], '_') . '/pan_photo', 'public');
        }
    }

    public function getTaxPaymentCertificateUrlAttribute(): string
    {
        return $this->attributes['tax_payment_certificate'] ?
            Storage::disk('public')->url($this->attributes['tax_payment_certificate']) : '';
    }

    public function setTaxPaymentCertificateAttribute($value)
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['tax_payment_certificate'] = $value->store('list_registration/' . Str::slug($this->attributes['main_person'], '_') . '/tax_payment_certificate', 'public');
        }
    }

    public function getLicensePhotoUrlAttribute(): string
    {
        return $this->attributes['license_photo'] ?
            Storage::disk('public')->url($this->attributes['license_photo']) : '';
    }

    public function setLicensePhotoAttribute($value)
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['license_photo'] = $value->store('list_registration/' . Str::slug($this->attributes['main_person'], '_') . '/license_photo', 'public');
        }
    }

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'model');
    }
}
