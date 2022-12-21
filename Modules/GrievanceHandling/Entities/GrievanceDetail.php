<?php

namespace Modules\GrievanceHandling\Entities;

use App\Models\File;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\GrievanceHandling\Enums\GrievanceComplaintSeverity;
use Modules\GrievanceHandling\Enums\GrievanceStatus;

class GrievanceDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'grievance_detail_id',
        'token',
        'grievance_user_id',
        'user_id',
        'grievance_type_id',
        'grievance_office_id',
        'subject',
        'description',
        'complaint_severity',
        'is_open',
        'status',
        'is_approved',
        'is_public',
    ];

    protected $casts = [
        'complaint_severity' => GrievanceComplaintSeverity::class,
        'status' => GrievanceStatus::class,
    ];

    public function scopeApproved($query)
    {
        return $query->where('is_approved', 1);
    }

    public function scopeNotApproved($query)
    {
        return $query->where('is_approved', 0);
    }

    public function scopePublic($query)
    {
        return $query->where('is_public', 1);
    }

    public function scopeNotPublic($query)
    {
        return $query->where('is_public', 0);
    }

    public function grievanceDetails(): HasMany
    {
        return $this->hasMany(__CLASS__);
    }

    public function grievanceUser(): BelongsTo
    {
        return $this->belongsTo(GrievanceUser::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function grievanceType(): BelongsTo
    {
        return $this->belongsTo(GrievanceType::class);
    }

    public function grievanceOffice(): BelongsTo
    {
        return $this->belongsTo(GrievanceOffice::class);
    }

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'model');
    }
}
