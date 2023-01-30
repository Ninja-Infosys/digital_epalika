<?php

namespace Modules\Recommendation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class PersonalDetail extends Model
{
    use HasFactory,SoftDeletes,EventObserveTrait;

   protected $dates = [
       'created_at',
       'updated_at',
       'deleted_at'
   ];

   protected $fillable = [
    'user_id',
    'reg_no',
    'name',
    'phone_no',
    'is_minor',
    'citizenship_no',
    'gender',
    'permanent_province_id',
    'permanent_district_id',
    'permanent_local_body_id',
    'ward_no',
    'tole'
   ];
}
