<?php

namespace Modules\TaskManagement\Entities;

use App\Models\Settings\Branch;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class FileActivity extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'file_tracking_id',
        'date_bs',
        'date_ad',
        'is_received',
        'status',
        'assigned_by',
        'assigned_branch_id',
        'remarks'
    ];

    public function scopeFilterData($query)
    {
        if(auth()->user()->role->type!='Super'){
            $query->whereHas('users', function ($q) {
                $q->where('file_activity_user.user_id', auth()->id());
            });
        }

        return $query;
    }

    public function fileTracking(): BelongsTo
    {
        return $this->belongsTo(FileTracking::class);
    }

    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }

    public function assignedBranch()
    {
        return $this->belongsTo(Branch::class, 'assigned_branch_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
