<?php

namespace Modules\EMap\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;

class DocumentFile extends Model
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
        "fileable",
        "building_documentation_id",
        "document",
    ];

    public function fileable(): MorphTo
    {
        return $this->morphTo();
    }

    public function buildingDocumentationId(): BelongsTo
    {
        return $this->belongsTo(BuildingDocumentation::class);
    }



    public function getDocumentUrlAttribute()
    {
        return $this->attributes['document'] ? Storage::disk('public')->url($this->attributes['document']) : '';
    }
}
