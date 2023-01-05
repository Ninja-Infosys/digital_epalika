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


    public function getAddressAttribute(): string
    {
        return "Address";
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
        return $this->belongsTo(LocalBody::class);
    }

    public function employeeSignature(): BelongsTo
    {
        return $this->belongsTo(EmployeeSignature::class);
    }

    protected function Photo(): Attribute
    {
        return Attribute::make(
            get: static fn($value) => $value ? Storage::disk('public')->url($value) : '',
            set: static fn($value) => (!empty($value) && !is_string($value)) ? $value->store('seniorCitizenship', 'public') : null,
        );
    }

    protected function LeftFinger(): Attribute
    {
        return Attribute::make(
            get: static fn($value) => $value ? Storage::disk('public')->url($value) : '',
            set: static fn($value) => (!empty($value) && !is_string($value)) ? $value->store('seniorCitizenship', 'public') : null,
        );
    }

    protected function RightFinger(): Attribute
    {
        return Attribute::make(
            get: static fn($value) => $value ? Storage::disk('public')->url($value) : '',
            set: static fn($value) => (!empty($value) && !is_string($value)) ? $value->store('seniorCitizenship', 'public') : null,
        );
    }


}
