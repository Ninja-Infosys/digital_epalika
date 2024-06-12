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
        'photo',
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
    protected function landownerProved(): Attribute
    {
        return Attribute::make(
            get: static fn ($value) => $value ? Storage::disk('public')->url($value) : '',
            set: static fn ($value) => (!empty($value) && !is_string($value)) ? $value->store('buildingDocument', 'public') : null,
        );
    }
    protected function buildingMap(): Attribute
    {
        return Attribute::make(
            get: static fn ($value) => $value ? Storage::disk('public')->url($value) : '',
            set: static fn ($value) => (!empty($value) && !is_string($value)) ? $value->store('buildingDocument', 'public') : null,
        );
    }
    protected function landMap(): Attribute
    {
        return Attribute::make(
            get: static fn ($value) => $value ? Storage::disk('public')->url($value) : '',
            set: static fn ($value) => (!empty($value) && !is_string($value)) ? $value->store('buildingDocument', 'public') : null,
        );
    }
    // protected function allRoundHousePic(): Attribute
    // {
    //     return Attribute::make(
    //         get: static fn ($value) => $value ? Storage::disk('public')->url($value) : '',
    //         set: static function ($value) {
    //             if (!empty($value) && is_object($value)) { // Check if $value is an object
    //                 return $value->store('buildingDocument', 'public');
    //             }
    //             return null;
    //         }
    //     );
    // }

    protected function photo(): Attribute
    {
        return Attribute::make(
            get: static fn ($value) => $value ? Storage::disk('public')->url($value) : '',
            set: static fn ($value) => (!empty($value) && !is_string($value)) ? $value->store('buildingDocument', 'public') : null,
        );
    }
    protected function revenue(): Attribute
    {
        return Attribute::make(
            get: static fn ($value) => $value ? Storage::disk('public')->url($value) : '',
            set: static fn ($value) => (!empty($value) && !is_string($value)) ? $value->store('buildingDocument', 'public') : null,
        );
    }
    public function files()
    {
        return $this->morphMany(File::class, 'model');
    }
}
