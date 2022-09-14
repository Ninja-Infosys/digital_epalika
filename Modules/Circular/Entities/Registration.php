<?php

namespace Modules\Circular\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Registration extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'registration_date',
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
            $this->attributes['signature_image'] = $value->store('registration/' . Str::slug($this->attributes['receiver_name'], '_' . '/signature'), 'public');
        }
    }
}
