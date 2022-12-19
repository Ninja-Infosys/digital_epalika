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
        'application_type',
        'title',
        'data',
        'status'
    ];

    protected $casts = [
        'application_type' => ApplicationTypeEnum::class,
    ];

    public function scopeActive($q)
    {
        return $q->where('status', 1);
    }

    public function scopeNotActive($q)
    {
        return $q->where('status', 0);
    }
}
