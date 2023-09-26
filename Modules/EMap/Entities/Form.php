<?php

namespace Modules\EMap\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Modules\EMap\Entities\New\MapPassGroup;
use Modules\EMap\Enums\EMapFormFillerTypeEnum;
use Modules\EMap\Enums\FormTypeEnum;

class Form extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        "title",
        "order",
        "form_type",
        "form_url_add",
        "form_url_edit",
        "form_url_view",
        "status",
        "group_id",
        "need_from",
    ];

    protected $casts = [
        "form_type" => FormTypeEnum::class,
        "need_from" => EMapFormFillerTypeEnum::class,
        "order" => 'integer',
        "status" => 'bool',
        "group_id" => 'integer',
    ];

    public function scopeStatus(Builder $builder, bool $status = true): void
    {
        $builder->where('status', $status);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(MapPassGroup::class);
    }

    public function formDocumentFormats(): HasMany
    {
        return $this->hasMany(FormDocumentFormat::class);
    }
}
