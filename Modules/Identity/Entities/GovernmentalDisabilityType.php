<?php

namespace Modules\Identity\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Modules\Identity\Enums\CategoryTypeEnum;

class GovernmentalDisabilityType extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'title',
        'title_en',
        'color',
        'category',
        'position'
    ];

    protected $casts = [
        'category' => CategoryTypeEnum::class
    ];

}
