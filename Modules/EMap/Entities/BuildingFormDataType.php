<?php

namespace Modules\EMap\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Modules\EMap\Enums\FormTypeEnum;

class BuildingFormDataType extends Model
{
    use HasFactory;
    use SoftDeletes;
    use EventObserveTrait;

    protected static function boot()
    {
        parent::boot();

        static::creating(static function ($model) {
            $model->model_type = $model->type->class();
        });

        static::updating(static function ($model) {
            if ($model->isDirty('type')) {
                $model->model_type = $model->type->class();
            }
        });

    }

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        "building_documentation_step_id",
        "type",
        "model_type",
        "model_id",
        "route_name",
    ];

    protected $casts = [
        "type" => FormTypeEnum::class,
    ];


    public function buildingDocumentationStep(): BelongsTo
    {
        return $this->belongsTo(BuildingDocumentationStep::class);
    }

    public function model(): MorphTo
    {
        return $this->morphTo();
    }

    public function buildingDocuments(): MorphMany
    {
        return $this->morphMany(BuildingDocument::class, 'form_data');
    }
}
