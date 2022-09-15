<?php

namespace Modules\Circular\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Dispatch extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'dispatch_date',
        'date',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'dispatch_no',
        'dispatch_date',
        'letter_number',
        'letter_date',
        'subject',
        'receiver_name',
        'receiver_address',
        'receiver_contact',
        'receiver_signature',
        'date',
        'remarks',
    ];

    public function getReceiverSignatureUrlAttribute(): string
    {
        return Storage::disk('public')->url($this->attributes['receiver_signature']);
    }

    public function setReceiverSignatureAttribute($value)
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['receiver_signature'] = $value->store('dispatch/signature/' . Str::slug($this->attributes['receiver_signature'], '_'), 'public');
        }
    }

    public function circularDocuments(): MorphMany
    {
        return $this->morphMany(CircularDocument::class, 'model');
    }
}
