<?php

namespace Modules\EMap\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;
use Modules\EMap\Enums\DocumentStatusEnum;

class BuildingDocument extends Model
{
    use HasFactory,SoftDeletes,EventObserveTrait;

    protected $touches = ['buildingDocumentation'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'building_documentation_step_id',
        'building_documentation_id',
        'status',
        'uploaded_by_type',
        'uploaded_by_id',
        'form_data_type',
        'form_data_id',

    ];

    protected $casts = [
        'status' => DocumentStatusEnum::class
    ];

    protected $appends = [
        'can_edit'
    ];

    protected $with = ['documentStatuses'];
    public function getCanEditAttribute(): bool
    {
        return match ($this->attributes['status']) {
            DocumentStatusEnum::APPROVED->value,
            DocumentStatusEnum::REVIEW->value => false,
            DocumentStatusEnum::PENDING->value,
            DocumentStatusEnum::MODIFY->value => true,
            default => false
        };
    }

    public function buildingDocumentationStep(): BelongsTo
    {
        return $this->belongsTo(BuildingDocumentationStep::class);
    }

    public function buildingDocumentation(): BelongsTo
    {
        return $this->belongsTo(BuildingDocumentation::class);
    }


    public function uploaded_by(): MorphTo
    {
        return $this->morphTo();
    }


    public function form_data(): MorphTo
    {
        return $this->morphTo();
    }

    public function documentStatuses(): HasMany
    {
        return $this->hasMany(DocumentStatus::class);
    }

    public function documentFiles(): MorphMany
    {
        return $this->morphMany(DocumentFile::class, 'fileable');
    }
    public function setApprovedDocumentAttribute($value): void
    {
        if(!empty($value) && !is_string($value)) {
            $this->attributes['approved_document'] = $value->store('e_map/building/approved_documents', 'public');
        }
    }

    public function getApprovedDocumentUrlAttribute($value): string
    {
        return  $this->attributes['approved_document'] ? Storage::disk('public')->url($this->attributes['approved_document']) : '';

    }
}
