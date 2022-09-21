<?php

namespace App\Models\ExecutiveMeeting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class WardMeetingNotice extends Model
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
        'broadcast_time',
        'type',
        'meeting_at',
        'meeting_subject',
        'description',
    ];

    public function wardMeetingDecisions(): HasMany
    {
        return $this->hasMany(WardMeetingDecision::class);
    }

    public function meetingDetails(): MorphMany
    {
        return $this->morphMany(MeetingDetail::class, 'model');
    }
}
