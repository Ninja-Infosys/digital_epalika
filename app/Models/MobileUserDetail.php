<?php

namespace App\Models;

use App\Enums\Gender;
use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Modules\Recommendation\Entities\RegistrationDetail;

class MobileUserDetail extends Model
{
    use EventObserveTrait, HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'mobile_user_id',
        'province_id',
        'district_id',
        'local_body_id',
        'ward_no',
        'tole',
        'temporary_province_id',
        'temporary_district_id',
        'temporary_local_body_id',
        'temporary_ward',
        'temporary_tole',
        'citizenship_no',
        'citizenship_issued_district',
        'citizenship_issued_date',
        'citizenship_front',
        'citizenship_back',
        'nec_no',
        'nec_certificate',
        ' reg_no',
        'is_minor',
        'gender',
        'user_id',
        'birth_registration_no',
    ];

    protected $casts = [
        'gender' => Gender::class,
    ];

    public function mobileUser(): BelongsTo
    {
        return $this->belongsTo(MobileUser::class);
    }

    public function citizenshipFront(): Attribute
    {
        return Attribute::make(
            get: function (?string $value) {
                if (! empty($value) && Storage::disk('public')->exists($value)) {
                    return Storage::disk('public')->url($value);
                }
            },
            set: function ($value) {
                if (! empty($value) && ! is_string($value)) {
                    return $value->store('mobileUserDetail/certificateFront', 'public');
                }
            }
        );
    }

    public function citizenshipBack(): Attribute
    {
        return Attribute::make(
            get: function (?string $value) {
                if (! empty($value) && Storage::disk('public')->exists($value)) {
                    return Storage::disk('public')->url($value);
                }
            },
            set: function ($value) {
                if (! empty($value) && ! is_string($value)) {
                    return $value->store('mobileUserDetail/certificateBack', 'public');
                }
            }
        );
    }

    public function necCertificate(): Attribute
    {
        return Attribute::make(
            get: function (?string $value) {
                if (! empty($value) && Storage::disk('public')->exists($value)) {
                    return Storage::disk('public')->url($value);
                }
            },
            set: function ($value) {
                if (! empty($value) && ! is_string($value)) {
                    return $value->store('mobileUserDetail/necCertificate', 'public');
                }
            }
        );
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function localBody(): BelongsTo
    {
        return $this->belongsTo(localBody::class);
    }

    public function registrationDetails(): HasMany
    {
        return $this->hasMany(RegistrationDetail::class);
    }
}
