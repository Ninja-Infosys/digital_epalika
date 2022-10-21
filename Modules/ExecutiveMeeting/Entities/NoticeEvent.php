<?php

namespace Modules\ExecutiveMeeting\Entities;

use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NoticeEvent extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'start',
        'end',
    ];

    protected $fillable = [
        'title',
        'start',
        'end',
        'className',
    ];
}
