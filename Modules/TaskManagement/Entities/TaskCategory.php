<?php

namespace Modules\TaskManagement\Entities;

use App\Models\Settings\Branch;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskCategory extends Model
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
        'branch_id',
        'title',
    ];

    public function scopeFilterData($query, $params = [])
    {
        if (!empty($params['branch_id'])) {
            if (is_array($params['branch_id'])) {
                $query->whereIn('branch_id', $params['branch_id']);
            } else {
                $query->where('branch_id', $params['branch_id']);
            }
        }

        return $query;
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function taskDivisions(): HasMany
    {
        return $this->hasMany(TaskDivision::class);
    }
}
