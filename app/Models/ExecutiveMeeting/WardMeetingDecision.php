<?php

namespace App\Models\ExecutiveMeeting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

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


    public function setDecisionFileAttribute($value)
    {
        if(!empty($value) && !is_string($value))
        {
            $this->attributes['decision_file'] = $value->store('wardMeeting','public');
        }
    }

    public function getDecisionFileUrlAttribute()
    {
        $this->attributes['decision_file'] ? Storage::disk('public')->url($this->attributes['decision_file']) : '';
    }
}
