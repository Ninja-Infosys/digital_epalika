<?php

namespace Modules\Grant\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class Group extends Model
{
    use HasFactory,SoftDeletes,EventObserveTrait;

   protected $dates = [
       'created_at',
       'updated_at',
       'deleted_at'
   ];

   protected $fillable = [
    'unique_id',
    'name',
    'registration_date',
    'registered_office',
    'monthly_meeting',
    'vat_pan',
    'province_id',
    'district_id',
    'local_body_id',
    'ward_no',
    'village',
    'tole',
    'user_id',
   ];
}
