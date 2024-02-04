<?php

namespace Modules\DigitalBoard\Entities;

use App\Models\File;
use App\Models\Settings\FiscalYear;
use App\Models\User;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Notice extends Model
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
        'title',
        'date',
        'en_date',
        'description',
        'closed_at',
        'show_on_index',
        'user_id',
        'type',
        'fiscal_year_id',
        'is_displayed',
        'ward',
    ];

    protected $casts = [
        'is_displayed' => 'boolean',
        
        'ward' => 'array',
        
    ];
    protected function ward(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => $value ? explode(',', $value) : [],
            set: fn(string|array|null $value) => $value ? (is_array($value) ? implode(',', $value) : $value) : null,
        );
    }

    
    public function scopeMainPageDisplay(Builder $builder, bool $display = true): void
    {
        $builder->where('is_displayed', $display);
    }

    // public function user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class);
    // }

    // public function files(): MorphMany
    // {
    //     return $this->morphMany(File::class, 'model');
    // }

    // public function fiscalYear(): BelongsTo
    // {
    //     return $this->belongsTo(FiscalYear::class);
    // }

    // public function scopeShowInIndex($builder)
    // {
    //     return $builder->where('show_on_index', 1);
    // }

    // public function scopeHideInIndex($builder)
    // {
    //     return $builder->where('show_on_index', 0);
    // }

    // public function scopeNullClosedAt($builder)
    // {
    //     return $builder->whereNull('closed_at');
    // }

    public function scopeNotice($builder)
    {
        return $builder->where('type', 'Notice');
    }

    public function scopeNews($builder)
    {
        return $builder->where('type', "News");
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'model');
    }


    public function scopeShowInIndex($builder)
    {
        return $builder->where('show_on_index', 1);
    }

    public function scopeHideInIndex($builder)
    {
        return $builder->where('show_on_index', 0);
    }

    public function scopeNullClosedAt($builder)
    {
        return $builder->whereNull('closed_at');
    }

    public function scopeContentType($builder, string $type)
    {
        return $builder->where('type', $type);

    }
}
