<?php

namespace Modules\Identity\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class IdentityMeeting extends Model
{
    use HasFactory;
    use SoftDeletes;
    use EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'title',
        'date_bs',
        'date_ad',
        'description'
    ];

    public function disabilityCommittees(): BelongsToMany
    {
        return $this->belongsToMany(DisabilityCommittee::class, 'committee_id', 'meeting_id');
    }
}
