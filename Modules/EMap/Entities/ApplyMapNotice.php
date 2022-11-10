<?php

namespace Modules\EMap\Entities;

use App\Models\File;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Modules\EMap\Enums\FileTypeEnum;
use Modules\EMap\Enums\NoticeTypeEnum;

class ApplyMapNotice extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'rejected_at'
    ];

    protected $fillable = [
        'map_apply_id',
        'file_type',
        'data',
        'rejected_at',
        'remarks'
    ];

    protected $casts = [
        'file_type' => NoticeTypeEnum::class
    ];

    public function scopeRejected($query)
    {
        return $query->whereNull('rejected_at');
    }

    public function getApplicationTypeAttribute()
    {
        return $this->attributes['file_type'];
    }

    public function mapApply(): BelongsTo
    {
        return $this->belongsTo(MapApply::class);
    }

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'model');
    }
}
