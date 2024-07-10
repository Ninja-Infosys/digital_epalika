<?php

namespace Modules\EMap\Entities;

use App\Models\File;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class RequiredDocument extends Model
{
    use EventObserveTrait, HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'building_documentation_id',
        'citizenship',
        'landowner_proved',
        'revenue',
        'building_map',
        'land_map',
        'all_round_house_pic',
        'citizenship_status',
        'landowner_proved_status',
        'revenue_status',
        'building_map_status',
        'land_map_status',
        'all_round_house_pic_status',
    ];

    public function buildingDocumentation(): BelongsTo
    {
        return $this->belongsTo(BuildingDocumentation::class);
    }

    protected function citizenship(): Attribute
    {
        return Attribute::make(
            get: static fn ($value) => $value ? Storage::disk('public')->url($value) : '',
            set: static fn ($value) => (!empty($value) && !is_string($value)) ? $value->store('buildingDocument', 'public') : null,
        );
    }
    public function getCitizenshipSizeAttribute(): string
    {
        if (!empty($this->attributes['citizenship'])) {
            return Storage::disk('public')->size($this->attributes['citizenship']);
        } else {
            return '';
        }
    }
    protected function landownerProved(): Attribute
    {
        return Attribute::make(
            get: static fn ($value) => $value ? Storage::disk('public')->url($value) : '',
            set: static fn ($value) => (!empty($value) && !is_string($value)) ? $value->store('buildingDocument', 'public') : null,
        );
    }
    public function getLandownerProvedSizeAttribute(): string
    {
        if (!empty($this->attributes['landowner_proved'])) {
            return Storage::disk('public')->size($this->attributes['landowner_proved']);
        } else {
            return '';
        }
    }
    protected function buildingMap(): Attribute
    {
        return Attribute::make(
            get: static fn ($value) => $value ? Storage::disk('public')->url($value) : '',
            set: static fn ($value) => (!empty($value) && !is_string($value)) ? $value->store('buildingDocument', 'public') : null,
        );
    }
    public function getBuildingMapSizeAttribute(): string
    {
        if (!empty($this->attributes['building_map'])) {
            return Storage::disk('public')->size($this->attributes['building_map']);
        } else {
            return '';
        }
    }
    protected function landMap(): Attribute
    {
        return Attribute::make(
            get: static fn ($value) => $value ? Storage::disk('public')->url($value) : '',
            set: static fn ($value) => (!empty($value) && !is_string($value)) ? $value->store('buildingDocument', 'public') : null,
        );
    }
    public function getLandMapSizeAttribute(): string
    {
        if (!empty($this->attributes['land_map'])) {
            return Storage::disk('public')->size($this->attributes['land_map']);
        } else {
            return '';
        }
    }
    protected function allRoundHousePic(): Attribute
    {
        return Attribute::make(
            get: static fn ($value) => $value ? Storage::disk('public')->url($value) : '',
            set: static fn ($value) => (!empty($value) && !is_string($value)) ? $value->store('buildingDocument', 'public') : null,
        );
    }
    public function getAllRoundHousePicSizeAttribute(): string
    {
        if (!empty($this->attributes['all_round_house_pic'])) {
            return Storage::disk('public')->size($this->attributes['all_round_house_pic']);
        } else {
            return '';
        }
    }
    protected function revenue(): Attribute
    {
        return Attribute::make(
            get: static fn ($value) => $value ? Storage::disk('public')->url($value) : '',
            set: static fn ($value) => (!empty($value) && !is_string($value)) ? $value->store('buildingDocument', 'public') : null,
        );
    }
    public function getRevenueSizeAttribute(): string
    {
        if (!empty($this->attributes['revenue'])) {
            return Storage::disk('public')->size($this->attributes['revenue']);
        } else {
            return '';
        }
    }


}
