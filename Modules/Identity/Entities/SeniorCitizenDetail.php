<?php

namespace Modules\Identity\Entities;

use App\Enums\Gender;
use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Support\Facades\Storage;

class SeniorCitizenDetail extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'photo',
        'left_finger',
        'right_finger',
        'name',
        'name_en',
        'dob_bs',
        'card_no',
        'gender',
        'citizenship_no',
        'issue_date_bs',
        'spouse',
        'spouse_en',
        'blood_group',
        'father_name',
        'father_name_en',
        'mother_name_en',
        'mother_name',
        'province_id',
        'district_id',
        'local_body_id',
        'ward_no',
        'tole',
        'patrons_name',
        'patrons_name_en',
        'patrons_name_address',
        'contact_person_name',
        'contact_person_name_en',
        'contact_person_phone',
        'contact_person_address',
        'is_disease',
        'disease_name',
        'description',
        'description_en',
        'is_medicine',
        'medicine_name',
        'employee_signature_id',
    ];

    protected $casts = [
        'gender' => Gender::class
    ];

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
        return $this->belongsTo(LocalBody::class);
    }

    public function employeeSignature(): BelongsTo
    {
        return $this->belongsTo(EmployeeSignature::class);
    }

    public function setPhotoAttribute($value)
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['photo'] = $value->store('seniorCitizenship', 'public');
        }
    }

    public function getPhotoAttribute(): string
    {
        return $this->attributes['photo'] ? Storage::disk('public')->url($this->attributes['photo']) : '';
    }

    public function setLeftFingerAttribute($value)
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['left_finger'] = $value->store('seniorCitizenship', 'public');
        }
    }

    public function getLeftFingerAttribute(): string
    {
        return $this->attributes['left_finger'] ? Storage::disk('public')->url($this->attributes['left_finger']) : '';
    }

    public function setRightFingerAttribute($value)
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['right_finger'] = $value->store('seniorCitizenship', 'public');
        }
    }

    public function getRightFingerAttribute(): string
    {
        return $this->attributes['right_finger'] ? Storage::disk('public')->url($this->attributes['right_finger']) : '';
    }

}
