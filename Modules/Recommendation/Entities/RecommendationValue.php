<?php

namespace Modules\Recommendation\Entities;

use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecommendationValue extends Model
{
    use EventObserveTrait;
    use HasFactory;
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'recommendation_create_id',
        'recommendation_form_field_id',
        'value',
        'status',
        'type',
    ];

    public function recommendationCreate(): BelongsTo
    {
        return $this->belongsTo(RecommendationCreate::class);
    }

    public function recommendationFormField(): BelongsTo
    {
        return $this->belongsTo(RecommendationFormField::class);
    }
}
