<?php

namespace Modules\OrganizationRegistration\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Institution extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'user_id',
        'registration_no',
        'registration_date',
        'registration_date_en',
        'name',
        'province_id',
        'district_id',
        'local_body_id',
        'ward_no',
        'institution_address',
        'contact_no',
        'email',
        'dao_registration_no',
        'dao_registration_date',
        'dao_registration_date_en',
        'swc_registration_no',
        'swc_registration_date',
        'swc_registration_date_en',
        'pan_vat',
        'objective',
        'area',
        'minute',
        'application',
        'Legislation',
        'Ward_recommendation',
        'stamp',
        'proposed_person',
        'supervisor_person',
        'approval_person',
        'proposed_person_designation',
        'supervisor_person_designation',
        'approval_person_designation',
    ];

    public function getPhotoUrlAttribute(): string
    {
        return !empty($this->attributes['']) ?
            Storage::disk('public')->url($this->attributes['minute'])
            : '';
    }

    public function setPhotoAttribute($value)
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['minute'] = $value->store('Institution/' . Str::slug($this->attributes['name'], '_') . 'photo', 'public');
        }
    }

    public function institutionOfficers(): HasMany
    {
        return $this->hasMany(InstitutionOfficer::class);
    }
}
