<?php

namespace App\Models\ExecutiveMeeting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class MunicipalMeetingDecision extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'meeting_detail_id',
        'subject',
        'date',
        'description',
        'decision_file',
    ];

    public function meetingDetail(): BelongsTo
    {
        return $this->belongsTo(MeetingDetail::class);
    }

    public function setDecisionFileAttribute($value)
    {
        if(!empty($value) && !is_string($value))
        {
            $this->attributes['decision_file'] = $value->store('municipalMeeting','public');
        }
    }

    public function getDecisionFileUrlAttribute()
    {
        $this->attributes['decision_file'] ? Storage::disk('public')->url($this->attributes['decision_file']) : '';
    }
}
