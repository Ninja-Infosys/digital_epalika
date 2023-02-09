<?php

namespace Modules\Recommendation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Modules\Recommendation\Enums\ApplicationTypeEnum;

class RecommendationTemplate extends Model
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
        'user_id',
        'recommendation_category_id',
        'is_active',
        'data',
        'title'
    ];

  

    public function scopeActive($q)
    {
        return $q->where('is_active', 1);
    }

    public function scopeNotActive($q)
    {
        return $q->where('is_active', 0);
    }
}
