<?php

namespace Modules\Recommendation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class RevenueHeader extends Model
{
    use HasFactory;
    use SoftDeletes;
    use EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
         'title',
         'amount'
    ];

    public function recommendationDetails(): BelongsToMany
    {
        return $this->belongsToMany(RecommendationDetail::class, 'recom_detail_revenue_header', 'revenue_header_id', 'recommendation_detail_id');
    }
}
