<?php

namespace App\Models\ExecutiveMeeting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class MeetingDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = [
        'meeting_date',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'model_type',
        'model_id',
        'meeting_date',
        'meeting_subject',
        'description',
    ];

    public function model(): MorphTo
    {
        return $this->morphTo();
    }
}
