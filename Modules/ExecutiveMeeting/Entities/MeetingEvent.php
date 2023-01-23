<?php

namespace Modules\ExecutiveMeeting\Entities;

use App\Models\User;
use App\Traits\EventObserveTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'committee_ward',
        'en_end_date',
        'event_for',
        'url',
        'recurrence_end_date',
        'en_recurrence_end_date',
        'description',
        'user_id'
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function getMessageDateAttribute(): string
    {
        return Carbon::parse($this->attributes['en_start_date'])
            ->subDay()
            ->toDateString();
    }

    protected function CommitteeWard(): Attribute
    {
        return Attribute::make(
            get: static fn($value) => explode(',', $value),
            set: static fn($value) => implode(',', $value),
        );
    }

    public function scopeFilterData($query)
    {
        if (auth()->user()->role->type !== 'Super') {
            $query->where('user_id', auth()->id());
            $query->orWhere('permanent_ward', auth()->user()->ward_no);
        }
        return $query;
    }

}
