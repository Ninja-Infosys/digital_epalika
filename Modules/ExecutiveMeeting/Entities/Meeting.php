<?php

namespace Modules\ExecutiveMeeting\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Modules\ExecutiveMeeting\Enums\RecurrenceTypeEnum;

class Meeting extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'en_start_date',
        'en_end_date',
        'en_recurrence_end_date'
    ];

    protected $fillable = [
        'committee_id',
        'meeting_id',
        'meeting_name',
        'recurrence',
        'start_date',
        'en_start_date',
        'end_date',
        'en_end_date',
        'recurrence_end_date',
        'en_recurrence_end_date',
        'description',
        'user_id'
    ];

    protected $casts = [
        'recurrence' => RecurrenceTypeEnum::class,
    ];

    public function committee(): BelongsTo
    {
        return $this->belongsTo(Committee::class);
    }

    public function meeting(): BelongsTo
    {
        return $this->belongsTo(Meeting::class);
    }

    public function meetings(): HasMany
    {
        return $this->hasMany(Meeting::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
