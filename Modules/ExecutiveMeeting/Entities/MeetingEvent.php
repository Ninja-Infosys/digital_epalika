<?php

namespace Modules\ExecutiveMeeting\Entities;

use App\Traits\EventObserveTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\ExecutiveMeeting\Enums\RecurrenceTypeEnum;

class MeetingEvent extends Model
{
    use HasFactory;
    use SoftDeletes;
    use EventObserveTrait;

    protected $dates = [
        'en_start_date',
        'en_end_date',
        'en_recurrence_end_date',
        'created_at',
        'updated_at',
        'deleted_at',
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
        'description',
    ];

    protected $casts = [
        'recurrence' => RecurrenceTypeEnum::class,
    ];

    public function meetingEvent(): BelongsTo
    {
        return $this->belongsTo(__CLASS__);
    }

    public function meetingEvents(): HasMany
    {
        return $this->hasMany(__CLASS__);
    }

    public function getMessageDateAttribute(): string
    {
        return Carbon::parse($this->attributes['en_start_date'])
            ->subDay()
            ->toDateString();
    }
}
