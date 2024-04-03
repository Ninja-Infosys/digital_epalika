<?php

namespace Modules\Recommendation\Entities;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Support\Facades\Storage;

class SignaturePerson extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'name',
        'signature_image',
        'image',
    ];
    public function setSignatureImageAttribute($value): void
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['signature_image'] = $value->store('recommendation/signaturePerson/', 'public');
        }
    }

    public function getSignatureImageUrlAttribute($value): string
    {
        return $this->attributes['signature_image'] ? Storage::disk('public')->url($this->attributes['signature_image']) : '';

    }
    public function setImageAttribute($value): void
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['image'] = $value->store('recommendation/image', 'public');
        }
    }

    public function getImageUrlAttribute($value): string
    {
        return $this->attributes['image'] ? Storage::disk('public')->url($this->attributes['image']) : '';

    }
}
