<?php

namespace Modules\ExecutiveMeeting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class MeetingEvent extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'meeting_event_id',
        'event_name',
        'recurrence',
        'start_date',
        'en_start_date',
        'end_date',
        'en_end_date',
        'event_for',
        'url',
        'recurrence_end_date',
        'en_recurrence_end_date',
        'description'
    ];

    public function meetingEvent(): BelongsTo
    {
        return $this->belongsTo(MeetingEvent::class);
    }

    public function meetingEvents(): HasMany
    {
        return $this->hasMany(MeetingEvent::class);
    }
}
