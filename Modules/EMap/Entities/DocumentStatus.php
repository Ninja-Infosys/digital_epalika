<?php

namespace Modules\EMap\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Modules\EMap\Enums\DocumentStatusEnum;

class DocumentStatus extends Model
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
        "building_document_id",
        "status",
        "comment",
    ];

    protected $casts = [
        'status' => DocumentStatusEnum::class
    ];

    public function buildingDocument(): BelongsTo
    {
        return $this->belongsTo(BuildingDocument::class);
    }

    public function documentFiles(): MorphMany
    {
        return $this->morphMany(DocumentFile::class, 'fileable');
    }
}
