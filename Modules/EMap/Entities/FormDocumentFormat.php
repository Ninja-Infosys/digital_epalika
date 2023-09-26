<?php

namespace Modules\EMap\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class FormDocumentFormat extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        "form_id",
        "title",
        "description",
        "status",
    ];

    public function scopeStatus(Builder $builder, bool $status = true): void
    {
        $builder->where('status', $status);
    }

    public function form(): BelongsTo
    {
        return $this->belongsTo(Form::class);
    }
}
