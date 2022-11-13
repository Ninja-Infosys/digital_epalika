<?php

namespace Modules\Grant\Entities;

use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Grant\Enums\GrantRecipientTypeEnum;

class GrantActivity extends Model
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
        'grant_recipient_type',
        'title',
    ];

    protected $casts = [
        'grant_recipient_type' => GrantRecipientTypeEnum::class,
    ];
}
