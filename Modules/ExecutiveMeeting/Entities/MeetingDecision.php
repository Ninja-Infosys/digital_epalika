<?php

namespace Modules\ExecutiveMeeting\Entities;

use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class MeetingDecision extends Model
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
        'meeting_id',
        'subject',
        'date',
        'en_date',
        'description',
        'user_id',
        'decision_file',
    ];

    public function meeting(): BelongsTo
    {
        return $this->belongsTo(Meeting::class);
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
