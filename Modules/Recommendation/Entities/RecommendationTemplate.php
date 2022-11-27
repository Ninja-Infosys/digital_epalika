<?php

namespace Modules\Recommendation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Modules\Recommendation\Enums\ApplicationTypeEnum;

class RecommendationTemplate extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'for',
        'type',
        'title',
        'data',
        'requires_header',
    ];

    protected $casts = [
        'for' => ApplicationTypeEnum::class,
    ];
}
