<?php

namespace Modules\Recommendation\Entities;

use App\Enums\FormFieldEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class RecommendationFormField extends Model
{
    use HasFactory,SoftDeletes,EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'recommendation_detail_id',
        'field_name',
        'slug',
        'created_by',
        'type',
        'recommendation_form_field_id',
    ];

    protected $casts = [
        'type' => FormFieldEnum::class
    ];

    public function recommendationFormField(): BelongsTo
    {
        return $this->belongsTo(RecommendationFormField::class);
    }

    public function recommendationFormFields(): HasMany
    {
        return $this->hasMany(RecommendationFormField::class);
    }


    public function recommendationDetail(): BelongsTo
    {
        return $this->belongsTo(RecommendationDetail::class);
    }


    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
