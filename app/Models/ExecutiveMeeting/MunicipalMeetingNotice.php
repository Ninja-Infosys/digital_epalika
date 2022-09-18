<?php

namespace App\Models\ExecutiveMeeting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MunicipalMeetingNotice extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'broadcast_date',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'broadcast_date',
        'type',
        'meeting_subject',
        'description',
    ];
}
