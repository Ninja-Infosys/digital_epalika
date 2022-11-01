<?php

namespace Modules\Roaster\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class Trainer extends Model
{
    use HasFactory,SoftDeletes,EventObserveTrait;

   protected $dates = [
       'created_at',
       'updated_at',
       'deleted_at'
   ];

   protected $fillable = [
       'name',
       'designation_id',
       'department_id',
       'level',
       'province_id',
       'district_id',
       'local_body_id',
       'ward',
       'tole',
       'office',
       'appointment_date',
       'phone',
       'email',
       'photo',
       'pan',
       'experience',
       'qualification',
       'bank_detail',
       'experience_as_trainee',
       'experience_as_trainer',
   ];
}
