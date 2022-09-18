<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListRegistration extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
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
        'date',
    ];
}
