<?php

namespace Modules\Circular\Entities;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Registration extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'registration_date',
        'letter_date',
        'date',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'registration_no',
        'registration_date',
        'letter_number',
        'letter_date',
        'sender_name',
        'subject',
        'receiver_name',
        'phone',
        'signature_image',
        'date',
        'remarks',
    ];

    public function getSignatureImageUrlAttribute(): string
    {
        return Storage::disk('public')->url($this->attributes['signature_image']);
    }

    public function setSignatureImageAttribute($value)
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['signature_image'] = $value->store('registration/' . Str::slug($this->attributes['receiver_name'], '_') . '/signature', 'public');
        }
    }

    public function circularDocuments(): MorphMany
    {
        return $this->morphMany(CircularDocument::class, 'model');
    }
}
