<?php

namespace Modules\DigitalBoard\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Settings\Branch;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
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
        'service_name',
        'time_taken',
        'responsible_officer',
        'office',
        'remarks',
        'ward',
        'is_displayed',
        'user_id',
    ];

    protected $casts = [
        'is_displayed' => 'boolean'
    ];

    public function scopeMainPageDisplay(Builder $builder, bool $display = true): void
    {
        $builder->where('is_displayed', $display);
    }

    protected function ward(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => explode(',', $value),
            set: fn (string|array|null $value) => !empty($value) ? is_array($value) ? implode(',', $value) : $value : null,
        );
    }
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function serviceDocuments(): HasMany
    {
        return $this->hasMany(ServiceDocument::class)->orderBy('position');
    }

    public function serviceProcesses(): HasMany
    {
        return $this->hasMany(ServiceProcess::class)->orderBy('position');
    }

    public function serviceEmployees(): HasMany
    {
        return $this->hasMany(ServiceEmployee::class)->orderBy('position');
    }
}
