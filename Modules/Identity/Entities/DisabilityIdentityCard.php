<?php

namespace Modules\Identity\Entities;

use App\Enums\BloodGroupEnum;
use App\Enums\Gender;
use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\Ethnicity;
use App\Models\Occupation;
use App\Models\Settings\FiscalYear;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Support\Facades\Storage;
use Modules\BusinessRegistration\Enums\Qualification;
use Modules\Identity\Enums\ReceivingBodyEnum;

class DisabilityIdentityCard extends Model
{
    use SoftDeletes;
    use EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'name',
        'name_en',
        'citizenship_no',
        'birth_registration_no',
        'father_name',
        'father_name_en',
        'mother_name',
        'mother_name_en',
        'dob',
        'dob_ad',
        'gender',
        'province_id',
        'district_id',
        'local_body_id',
        'ward_no',
        'photo',
        'guardian_name',
        'guardian_name_en',
        'relationship_id',
        'phone',
        'disability_type_id',
        'status',
    ];

    protected $casts = [
        'gender' => Gender::class,
    ];

    public function fiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class);
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function districts(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function localBody(): BelongsTo
    {
        return $this->belongsTo(LocalBody::class);
    }

    public function disabilityType(): BelongsTo
    {
        return $this->belongsTo(DisabilityType::class);
    }

    public function relationship(): BelongsTo
    {
        return $this->belongsTo(Relationship::class);
    }

    public function setPhotoAttribute($value): void
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['photo'] = $value->store('disabilityIdentityCard', 'public');
        }
    }

    public function getPhotoUrlAttribute(): string
    {

        return $this->attributes['photo']
            ? Storage::disk('public')->url($this->attributes['photo'])
            : $this->attributes['photo'];

        if ($this->attributes['photo']) {
            return !isBase64($this->attributes['photo'])
                ? Storage::disk('public')->url($this->attributes['photo'])
                : $this->attributes['photo'];
        } else {
            return '';
        }
    }


    public function getCitizenshipPhotoUrlAttribute(): string
    {
        return $this->attributes['citizenship_photo'] ? Storage::disk('public')->url($this->attributes['citizenship_photo']) : '';
    }


    public function getCitizenshipPhotoCertificateUrlAttribute(): string
    {
        return $this->attributes['citizenship_photo_certificate'] ? Storage::disk('public')->url($this->attributes['citizenship_photo_certificate']) : '';

    }

    public function setCitizenshipPhotoCertificateAttribute($value): void
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['citizenship_photo_certificate'] = $value->store('disabilityIdentityCard', 'public');
        }
    }

    protected function HelpingTask(): Attribute
    {

        return Attribute::make(
            get: static fn($value) => explode(',', $value),
            set: static fn($value) => implode(',', $value),
        );
    }

    protected function WithoutHelpingTask(): Attribute
    {

        return Attribute::make(
            get: static fn($value) => explode(',', $value),
            set: static fn($value) => implode(',', $value),
        );
    }

    public function getRightFingerAttribute()
    {
        if ($this->attributes['finger_right']) {
            return !empty($this->attributes['finger_right'])
                ? Storage::disk('public')->url($this->attributes['finger_right'])
                : $this->attributes['finger_right'];
        } else {
            return '';
        }
    }

    public function getLeftFingerAttribute()
    {
        if ($this->attributes['finger_left']) {
            return !empty($this->attributes['finger_left'])
                ? Storage::disk('public')->url($this->attributes['finger_left'])
                : $this->attributes['finger_left'];
        } else {
            return '';
        }
    }

    public function getCanEditDeleteAttribute(): bool
    {
        return (auth()->user()->role->type === 'Super' || auth()->id()==$this->user_id);
    }

    public function scopeFilterData($query)
    {
        if (auth()->user()->role->type !== 'Super') {
            $query->where('user_id', auth()->id());
            $query->orWhere('permanent_ward', auth()->user()->ward_no);
        }
        return $query;
    }

}
