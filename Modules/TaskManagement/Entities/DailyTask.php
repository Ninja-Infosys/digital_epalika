<?php

namespace Modules\TaskManagement\Entities;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class DailyTask extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'en_date',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'task_division_id',
        'date',
        'en_date',
        'remarks'
    ];

    public function taskDivision(): BelongsTo
    {
        return $this->belongsTo(TaskDivision::class);
    }

    public function files(): MorphMany
    {
        return $this->morphMany(File::class,'model');
    }
}
