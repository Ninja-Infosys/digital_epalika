<?php

namespace Modules\EMap\Entities;

use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Modules\EMap\Enums\FileTypeEnum;
use Modules\EMap\Enums\NoticeTypeEnum;

class ApplyMapNotice extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'rejected_at'
    ];

    protected $fillable = [
        'map_apply_id',
        'file',
        'type',
        'file_type',
        'rejected_at'
    ];

    protected $casts = [
        'file_type' => NoticeTypeEnum::class,
        'type' => FileTypeEnum::class
    ];

    public function scopeNotice($query)
    {
        return $query->where('type', FileTypeEnum::NOTICE->value);
    }

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

    public function setFileAttribute($value): void
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['file'] = $value->store('applyMapNotice', 'public');
        }
    }

    public function getFileUrlAttribute(): string
    {
        return $this->attributes['file'] ? Storage::disk('public')->url($this->attributes['file']) : '';
    }
}
