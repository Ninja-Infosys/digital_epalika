<?php

namespace Modules\Circular\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class CircularDocument extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'model',
        'file_name',
        'extension',
        'file',
    ];

    public function getFileUrlAttribute(): string
    {
        return Storage::disk('public')->url($this->attributes['file']);
    }

    public function model(): MorphTo
    {
        return $this->morphTo();
    }
}
