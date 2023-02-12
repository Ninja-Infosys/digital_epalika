<?php

namespace Modules\Recommendation\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Support\Facades\Storage;

class RegistrationDetail extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function personalDetail(): BelongsTo
    {
        return $this->belongsTo(PersonalDetail::class);
    }

    public function recommendationCategory(): BelongsTo
    {
        return $this->belongsTo(RecommendationCategory::class);
    }

    public function Application(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Storage::disk('public')->url($value),
            set: fn($value) => (!empty($value) && !is_string($value)) ? $value->store('registrationDetail', 'public') : null,
        );
    }
}

