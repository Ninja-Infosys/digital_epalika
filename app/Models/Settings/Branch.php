<?php

namespace App\Models\Settings;

use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\HelpDesk\Entities\Service;

class Branch extends Model
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
        'branch_name',
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(__CLASS__);
    }

    public function branches(): HasMany
    {
        return $this->hasMany(__CLASS__);
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }
}
