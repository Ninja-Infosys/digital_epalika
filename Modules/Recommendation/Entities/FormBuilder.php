<?php

namespace Modules\Recommendation\Entities;

use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Recommendation\Enums\ApplicationTypeEnum;

class FormBuilder extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'application_type',
        'form',
        'title',
        'status'
    ];

    protected $casts = [
        'application_type' => ApplicationTypeEnum::class,
    ];


}
