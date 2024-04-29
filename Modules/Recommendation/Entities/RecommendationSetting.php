<?php

namespace Modules\Recommendation\Entities;

use App\Models\Settings\Employee;
use App\Models\User;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecommendationSetting extends Model
{
    use EventObserveTrait;
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'ward',
        'approver_id',
        'checker_id',
        'user_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approver_id');
    }

    public function checker(): BelongsTo
    {
        return $this->belongsTo(User::class, 'checker_id');
    }
}
