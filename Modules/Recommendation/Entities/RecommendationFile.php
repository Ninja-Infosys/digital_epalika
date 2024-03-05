<?php

namespace Modules\Recommendation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class RecommendationFile extends Model
{
    use HasFactory;
    use SoftDeletes;
    use EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
         'recommendation_create_id',
         'recommendation_document_id',
         'file',
    ];

    public function getFileExtensionAttribute()
    {
        return !empty($this->file) ? pathinfo($this->file, PATHINFO_EXTENSION) : '';
    }

    public function getFileUrlAttribute(): string
    {
        return Storage::disk('public')->url($this->file);
    }

    public function setFileAttribute($value): void
    {
        if(!empty($value) && $value instanceof UploadedFile) {
            $this->attributes['file'] = $value->store('recommendation/files', 'public');
        }
    }

    public function recommendationCreate(): BelongsTo
    {
        return $this->belongsTo(RecommendationCreate::class);
    }

    public function recommendationDocument(): BelongsTo
    {
        return $this->belongsTo(RecommendationDocument::class);
    }
}
