<?php

namespace App\Models\ExecutiveMeeting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        'municipal_meeting_notice_id',
        'subject',
        'date',
        'description',
        'decision_file',
    ];

    public function municipalMeetingNotice(): BelongsTo
    {
        return $this->belongsTo(MunicipalMeetingNotice::class);
    }
}
