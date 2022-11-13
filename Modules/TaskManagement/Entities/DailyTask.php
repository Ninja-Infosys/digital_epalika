<?php

namespace Modules\TaskManagement\Entities;

use App\Models\File;
use App\Models\Settings\Branch;
use App\Models\Settings\FiscalYear;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyTask extends Model
{
    use HasFactory;
    use SoftDeletes;
    use EventObserveTrait;

    protected $dates = [
        'en_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'fiscal_year_id',
        'branch_id',
        'task_category_id',
        'task_division_id',
        'date',
        'en_date',
        'remarks',
    ];

    public function fiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class);
    }

    public function branch(): BelongsTo
    {
        return  $this->belongsTo(Branch::class);
    }

    public function taskCategory(): BelongsTo
    {
        return $this->belongsTo(TaskCategory::class);
    }

    public function taskDivision(): BelongsTo
    {
        return $this->belongsTo(TaskDivision::class);
    }

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'model');
    }
}
