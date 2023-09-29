<?php

namespace Modules\EMap\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Modules\EMap\Enums\DocumentStatusEnum;

class AppliedDocument extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'form_id',
        'map_apply_id',
        'status',
        'uploaded_by',
    ];

    protected $casts = [
        'status' => DocumentStatusEnum::class
    ];

    public function form(): BelongsTo
    {
        return $this->belongsTo(Form::class);
    }

    public function mapApply(): BelongsTo
    {
        return $this->belongsTo(MapApply::class);
    }

    public function uploaded_by(): MorphTo
    {
        return $this->morphTo();
    }

    public function appliedMapFiles(): MorphMany
    {
        return $this->morphMany(AppliedMapFile::class, 'fileable');
    }
}
