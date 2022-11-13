<?php

namespace Modules\BusinessRegistration\Entities;

use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\BusinessRegistration\Enums\TemplateTypeEnum;

class BusinessRegistrationTemplate extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'for',
        'data',
        'title',
        'requires_header',
    ];

    protected $casts = [
        'for' => TemplateTypeEnum::class,
    ];
}
