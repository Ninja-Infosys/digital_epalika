<?php

namespace Modules\ExecutiveMeeting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Support\Facades\Storage;

class MeetingDecision extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'meeting_event_id',
        'meeting_for',
        'subject',
        'date',
        'en_date',
        'description',
        'decision_file',
    ];

    public function meetingEvent(): BelongsTo
    {
        return $this->belongsTo(MeetingEvent::class);
    }

    public function setDecisionFileAttribute($value)
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['decision_file'] = $value->store('municipalMeeting', 'public');
        }
    }

    public function getDecisionFileUrlAttribute(): string
    {
        return $this->attributes['decision_file']
            ? Storage::disk('public')->url($this->attributes['decision_file'])
            : '';
    }
}
