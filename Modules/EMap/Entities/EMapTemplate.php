<?php

namespace Modules\EMap\Entities;

use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\EMap\Enums\EMapFormFillerTypeEnum;
use Modules\EMap\Enums\NoticeTypeEnum;

class EMapTemplate extends Model
{
    use HasFactory;
    use SoftDeletes;
    use EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'for',
        'type',
        'data',
        'title',
        'requires_header',
    ];

    protected $casts = [
        'for' => NoticeTypeEnum::class,
        'type' => EMapFormFillerTypeEnum::class,
    ];
}
