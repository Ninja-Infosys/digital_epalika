<?php

namespace Modules\Recommendation\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class RegistrationDetail extends Model
{
    use HasFactory,SoftDeletes,EventObserveTrait;

   protected $dates = [
       'created_at',
       'updated_at',
       'deleted_at'
   ];

   protected $fillable = [
    'user_id',
    'registration_no',
    'date_ne',
    'date_en',
    'application',
    'recommendation',
    'recommendation_data',
    'personal_detail_id',
    'recommendation_category_id'
   ];
   public function user(){
    return $this->belongsTo(User::class);
   }
   public function personalDetail(){
    return $this->belongsTo(PersonalDetail::class);
   }
   public function recommendationCategory(){
    return $this->belongsTo(RecommendationCategory::class);
   }
}

