<?php

namespace Modules\Recommendation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class RecommendationDetail extends Model
{
    use HasFactory,SoftDeletes,EventObserveTrait;

   protected $dates = [
       'created_at',
       'updated_at',
       'deleted_at'
   ];

   protected $fillable = [
        'recommendation_category_id',
        'title',
        'title_en',
        'type',
        'service_cost',
        'general_time',
        'surrogate_time',
        'is_citizenship_required',
        'is_applicable_org',
        'is_applicant_self',
        'is_permission_required',
        'is_taxcode_required',
        'add_land_diff_locations',
        'is_applicable_on_recommendation',
        'order',
        'status',
        'description',
   ];

    public function recommendationCategory(): BelongsTo
    {
        return $this->belongsTo(RecommendationCategory::class);
   }
}
