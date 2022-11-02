<?php

namespace Modules\Grant\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Modules\Grant\Enums\GrantRecipientTypeEnum;

class GrantActivity extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'grant_recipient_type',
        'title'
    ];

    protected $casts=[
        'grant_recipient_type'=>GrantRecipientTypeEnum::class
    ];
}
