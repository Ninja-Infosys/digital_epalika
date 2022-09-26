<?php

namespace Modules\BusinessRegistration\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class BusinessRegistrationFile extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

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
}
