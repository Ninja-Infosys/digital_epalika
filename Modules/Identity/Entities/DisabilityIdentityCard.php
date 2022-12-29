<?php

namespace Modules\Identity\Entities;

use App\Enums\Gender;
use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\Ethnicity;
use App\Models\Occupation;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Support\Facades\Storage;

class DisabilityIdentityCard extends Model
{
    use SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'is_necessary',
        'material_name',
        'identity_type',
        'temporary_tole',
        'permanent_tole',
        'photo',
        'finger_print_type',
        'finger_left',
        'finger_right',
        'name',
        'name_en',
        'gender',
        'ethnicity_id',
        'dob_bs',
        'dob_ad',
        'temporary_province_id',
        'temporary_district_id',
        'temporary_local_body_id',
        'temporary_ward',
        'permanent_province_id',
        'permanent_district_id',
        'permanent_local_body_id',
        'permanent_ward',
        'guardian_name',
        'guardian_name_en',
        'relationship_id',
        'phone',
        'disability_type_id',
        'blood_group',
        'disability_reason_id',
        'receiving_body',
        'card_no',
        'date_ad',
        'date_bs',
        'father_name',
        'father_name_en',
        'grand_father_name',
        'grand_father_name_en',
        'mother_name',
        'mother_name_en',
        'birth_registration_no',
        'birth_registration_place',
        'birth_registration_bs',
        'birth_registration_ad',
        'citizenship_no',
        'citizenship_no_place',
        'citizenship_no_bs',
        'citizenship_no_ad',
        'citizenship_photo',
        'citizenship_photo_certificate',
        'qualification',
        'material_description',
        'daily_activity',
        'supporting_material',
        'helping_task',
        'without_helping_task',
        'main_training_name',
        'occupation_id',
        'provide_detail_full_name',
        'provide_detail_address',
        'provide_detail_phone_no',
        'provide_detail_citizenship_no',
        'provide_detail_citizenship_no_date',
        'provide_detail_citizenship_no_place',
    ];

    protected $casts = [
        'gender' => Gender::class
    ];


    public function temporaryProvince(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'temporary_province_id');
    }

    public function temporaryDistrict(): BelongsTo
    {
        return $this->belongsTo(District::class, 'temporary_district_id');
    }

    public function temporaryLocalBody(): BelongsTo
    {
        return $this->belongsTo(LocalBody::class, 'temporary_local_body_id');
    }

    public function permanentProvince(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'permanent_province_id');
    }

    public function permanentDistrict(): BelongsTo
    {
        return $this->belongsTo(District::class, 'permanent_district_id');
    }

    public function permanentLocalBody(): BelongsTo
    {
        return $this->belongsTo(LocalBody::class, 'permanent_local_body_id');
    }

    public function disabilityReason(): BelongsTo
    {
        return $this->belongsTo(DisabilityReason::class);
    }

    public function ethnicity(): BelongsTo
    {
        return $this->belongsTo(Ethnicity::class);
    }

    public function relationship(): BelongsTo
    {
        return $this->belongsTo(Relationship::class);
    }

    public function disabilityType(): BelongsTo
    {
        return $this->belongsTo(DisabilityType::class);
    }


    public function occupation(): BelongsTo
    {
        return $this->belongsTo(Occupation::class);
    }


    public function setPhotoAttribute($value): void
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['photo'] = $value->store('disabilityIdentityCard', 'public');
        }
    }

    public function getPhotoUrlAttribute(): string
    {
       return $this->attributes['photo'] ? Storage::disk('public')->url($this->attributes['photo']) : '';
    }

    public function setFingerLeftAttribute($value): void
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['finger_left'] = $value->store('disabilityIdentityCard', 'public');
        }
    }

    public function setFingerRightAttribute($value): void
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['finger_right'] = $value->store('disabilityIdentityCard', 'public');
        }
    }

    public function setCitizenshipPhotoAttribute($value): void
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['citizenship_photo'] = $value->store('disabilityIdentityCard', 'public');
        }
    }

    public function setCitizenshipPhotoCertificate($value): void
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['citizenship_photo_certificate'] = $value->store('disabilityIdentityCard', 'public');
        }
    }

    protected function HelpingTask(): Attribute
    {

        return Attribute::make(
            get: static fn ($value) => explode(',',$value),
            set: static fn ($value) => implode(',',$value),
        );
    }

    protected function WithoutHelpingTask(): Attribute
    {

        return Attribute::make(
            get: static fn ($value) => explode(',',$value),
            set: static fn ($value) => implode(',',$value),
        );
    }


}
