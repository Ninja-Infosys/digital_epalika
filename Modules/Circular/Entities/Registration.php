<?php

namespace Modules\Circular\Entities;

use App\Models\File;
use App\Models\Settings\FiscalYear;
use App\Traits\EventObserveTrait;
use App\Traits\GetAllColumns;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Registration extends Model
{
    use HasFactory;
    use SoftDeletes;
    use EventObserveTrait;
    use GetAllColumns;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'fiscal_year_id',
        'registration_no',
        'registration_date',
        'en_registration_date',
        'letter_number',
        'letter_date',
        'en_letter_date',
        'sender_name',
        'subject',
        'receiver_name',
        'phone',
        'signature_image',
        'date',
        'remarks',
    ];

    protected $appends = [
        'registration_month'
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
            $this->attributes['signature_image'] = $value->store('Registration/' . Str::slug($this->attributes['registration_no'] ?? $this->attributes['receiver_name'], '_'), 'public');
        }
    }

    public function getRegistrationMonthAttribute(): string
    {
        return explode('-', $this->registration_date)[1] ?? '';
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
