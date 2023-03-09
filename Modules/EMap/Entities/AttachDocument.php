<?php

namespace Modules\EMap\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class AttachDocument extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'map_apply_id',
        'land_owner_document',
        'land_revenue_document',
        'land_owner_citizenship',
        'blue_print',
        'pass_document',
        'designer_document',
        'permission_document',
        'inheritance_document',
    ];

    public function mapApply(): BelongsTo
    {
        return $this->belongsTo(MapApply::class);
    }


    protected function landOwnerDocument(): Attribute
    {
        return Attribute::make(
            get: static fn($value) => Storage::disk('public')->url($value),
            set: static fn($value) => (!empty($value) && !is_string($value)) ? $value->store('attachDocument', 'public') : null,
        );
    }
    protected function landRevenueDocument(): Attribute
    {
        return Attribute::make(
            get: static fn($value) => Storage::disk('public')->url($value),
            set: static fn($value) => (!empty($value) && !is_string($value)) ? $value->store('attachDocument', 'public') : null,
        );
    }
    protected function landOwnerCitizenship(): Attribute
    {
        return Attribute::make(
            get: static fn($value) => Storage::disk('public')->url($value),
            set: static fn($value) => (!empty($value) && !is_string($value)) ? $value->store('attachDocument', 'public') : null,
        );
    }
    protected function bluePrint(): Attribute
    {
        return Attribute::make(
            get: static fn($value) => Storage::disk('public')->url($value),
            set: static fn($value) => (!empty($value) && !is_string($value)) ? $value->store('attachDocument', 'public') : null,
        );
    }
    protected function passDocument(): Attribute
    {
        return Attribute::make(
            get: static fn($value) => Storage::disk('public')->url($value),
            set: static fn($value) => (!empty($value) && !is_string($value)) ? $value->store('attachDocument', 'public') : null,
        );
    }
    protected function designerDocument(): Attribute
    {
        return Attribute::make(
            get: static fn($value) => Storage::disk('public')->url($value),
            set: static fn($value) => (!empty($value) && !is_string($value)) ? $value->store('attachDocument', 'public') : null,
        );
    }
    protected function permissionDocument(): Attribute
    {
        return Attribute::make(
            get: static fn($value) => Storage::disk('public')->url($value),
            set: static fn($value) => (!empty($value) && !is_string($value)) ? $value->store('attachDocument', 'public') : null,
        );
    }
    protected function inheritanceDocument(): Attribute
    {
        return Attribute::make(
            get: static fn($value) => Storage::disk('public')->url($value),
            set: static fn($value) => (!empty($value) && !is_string($value)) ? $value->store('attachDocument', 'public') : null,
        );
    }
}
