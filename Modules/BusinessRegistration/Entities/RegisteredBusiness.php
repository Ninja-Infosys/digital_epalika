<?php

namespace Modules\BusinessRegistration\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class RegisteredBusiness extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'business_detail_id',
        'registration_no',
        'business_name',
        'registration_date',
        'active',
    ];
}
