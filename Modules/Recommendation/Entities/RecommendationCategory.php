<?php

namespace Modules\Recommendation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RecommendationCategory extends Model
{
    use HasFactory,SoftDeletes,EventObserveTrait;

   protected $dates = [
       'created_at',
       'updated_at',
       'deleted_at'
   ];

   protected $fillable = [
    'title',
    'recommendation_category_id',
    'is_active',
    'user_id'
   ];

   public function recommendationCategory()
   {
    return $this->belongsTo(RecommendationCategory::class);
   }

   public function recommendationCategories()
   {
    return $this->hasMany(RecommendationCategory::class);
   }

   public function user()
   {
    return $this->belongsTo(RecommendationCategory::class);
   }

   public function recommendationTemplates(){
    return $this->hasMany(RecommendationTemplate::class);
   }
   public function scopeActive($q)
    {
        return $q->where('is_active', 1);
    }

    public function scopeNotActive($q)
    {
        return $q->where('is_active', 0);
    }
}
