<?php

namespace Modules\TaskManagement\Entities;

use App\Models\Settings\Branch;
use App\Models\Settings\FiscalYear;
use App\Models\User;
use App\Traits\GetAllColumns;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class Activity extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait, GetAllColumns;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'date_en',
    ];

    protected $fillable = [
        'date',
        'date_en',
        'branch_id',
        'user_id',
        'fiscal_year_id',
        'remarks',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function fiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class);
    }

    public function activityLists(): HasMany
    {
        return $this->hasMany(ActivityList::class);
    }
}
