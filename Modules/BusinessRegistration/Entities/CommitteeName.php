<?php

namespace Modules\BusinessRegistration\Entities;

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
use Illuminate\Support\Str;
class CommitteeName extends Model
{
    use HasFactory;
    use SoftDeletes;
    use EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'organization_registration_id',
        'name',
        'name_en',
        'citizenship_no',
        'issue_date',
        'issue_district_id',
        'phone',
        'email',
        'designation',
        'province_id',
        'district_id',
        'local_body_id',
        'ward_no',
        'way',
        'tole',
        'national_card_no',
        'gender',
        'father_name',
        'grandfather_name',
        'photo',
        'citizenship_front',
        'citizenship_back',
        'position',
    ];

    protected $casts = [
        'gender' => Gender::class,
    ];



    public function photo(): Attribute
    {
        return Attribute::make(
            get: fn ($value) =>  !empty($value) ? Storage::url($value) : asset("assets/backend/images/user_icon.jpg"),
            set: fn ($value) => (!empty($value) && !is_string($value))
                ? $value->store('committee_member/' . Str::slug($this->attributes['name_en']), 'public')
                : null
        );
    }

    public function citizenshipFront(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Storage::url($value),
            set: fn ($value) => (!empty($value) && !is_string($value))
                ? $value->store('committee_member/' . Str::slug($this->attributes['name_en']), 'public')
                : null
        );
    }
    public function citizenshipBack(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Storage::url($value),
            set: fn ($value) => (!empty($value) && !is_string($value))
                ? $value->store('committee_member/' . Str::slug($this->attributes['name_en']), 'public')
                : null
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

    public function issueDistrict(): BelongsTo
    {
        return $this->belongsTo(District::class, 'issue_district_id');
    }

    public function localBody(): BelongsTo
    {
        return $this->belongsTo(LocalBody::class);
    }

    public function organizationRegistration(): BelongsTo
    {
        return $this->belongsTo(OrganizationRegistration::class);
    }
}
