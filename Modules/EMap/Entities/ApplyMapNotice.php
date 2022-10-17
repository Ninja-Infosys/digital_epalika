<?php

namespace Modules\EMap\Entities;

use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
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
        'file_type',
        'rejected_at'
    ];

    protected $casts = [
        'file_type' => NoticeTypeEnum::class,
    ];

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
