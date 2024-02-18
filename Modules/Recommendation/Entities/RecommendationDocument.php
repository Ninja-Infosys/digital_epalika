<?php

namespace Modules\Recommendation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class RecommendationDocument extends Model
{
    use HasFactory,SoftDeletes,EventObserveTrait;

   protected $dates = [
       'created_at',
       'updated_at',
       'deleted_at'
   ];

   protected $fillable = [
        'title'
   ];

    public function recommendationDetails(): BelongsToMany
    {
        return $this->belongsToMany(RecommendationDetail::class, 'recom_detail_recom_document', 'recommendation_document_id', 'recommendation_detail_id');
    }
}
