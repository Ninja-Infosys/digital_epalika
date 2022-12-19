<?php

namespace App\Models\ExecutiveMeeting;

use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class MunicipalMeetingNotice extends Model
{
    use HasFactory, SoftDeletes,EventObserveTrait;

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

    public function municipalMeetingDecisions(): HasMany
    {
        return $this->hasMany(MunicipalMeetingDecision::class);
    }

    public function meetingDetails(): MorphMany
    {
        return $this->morphMany(MeetingDetail::class, 'model');
    }
}
