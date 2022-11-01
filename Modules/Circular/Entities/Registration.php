<?php

namespace Modules\Circular\Entities;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\File;
use App\Models\Settings\FiscalYear;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Registration extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'en_registration_date',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'fiscal_year_id',
        'registration_no',
        'registration_date',
        'en_registration_date',
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
        return
            $this->attributes['signature_image']
                ? Storage::disk('public')->url($this->attributes['signature_image'])
                : '';
    }

    public function setSignatureImageAttribute($value)
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['signature_image'] = $value->store('registration/' . Str::slug($this->attributes['receiver_name'], '_') . '/signature', 'public');
        }
    }

    public function fiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class);
    }

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'model');
    }
}
