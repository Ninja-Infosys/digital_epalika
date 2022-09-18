<?php

namespace App\Models\ExecutiveMeeting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class WardMeetingDecision extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'ward_meeting_notice_id',
        'subject',
        'date',
        'description',
        'decision_file',
    ];

    public function wardMeetingNotice(): BelongsTo
    {
        return $this->belongsTo(WardMeetingNotice::class);
    }
}
