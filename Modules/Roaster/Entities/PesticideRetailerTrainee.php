<?php

namespace Modules\Roaster\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class PesticideRetailerTrainee extends Model
{
    use HasFactory,SoftDeletes,EventObserveTrait;

   protected $dates = [
       'created_at',
       'updated_at',
       'deleted_at'
   ];

   protected $fillable = [
       'full_name',
       'province_id',
       'district_id',
       'local_body_id',
       'training_id',
       'ward_no',
       'tole',
       'citizenship_no',
       'gender',
       'ethnicity_id',
       'category',
       'phone_no',
       'email_id',
       'qualification',
       'current_profession',
       'farming_area',
       'photo',
       'application_form',
       'ward_recommendation',
       'mark_sheet',
       'citizenship_front',
       'citizenship_back',
       'passport',
       'visa',
       'other_training',
       'select',
       'reference_id'
   ];
}
