<?php

namespace Modules\Circular\Entities;

use App\Models\File;
use App\Models\Settings\FiscalYear;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Dispatch extends Model
{
    use HasFactory;
    use SoftDeletes;
    use EventObserveTrait;

    protected $dates = [
        'en_dispatch_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'fiscal_year_id',
        'dispatch_no',
        'dispatch_date',
        'en_dispatch_date',
        'letter_number',
        'letter_date',
        'subject',
        'receiver_name',
        'receiver_address',
        'receiver_contact',
        'receiver_signature',
        'remarks',
    ];

    public function getReceiverSignatureUrlAttribute(): string
    {
        return $this->attributes['receiver_signature']
            ? Storage::disk('public')->url($this->attributes['receiver_signature'])
            : '';
    }

    public function setReceiverSignatureAttribute($value)
    {
        if (! empty($value) && ! is_string($value)) {
            $this->attributes['receiver_signature'] = $value->store('dispatch/signature/'.Str::slug($this->attributes['receiver_name'], '_'), 'public');
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
