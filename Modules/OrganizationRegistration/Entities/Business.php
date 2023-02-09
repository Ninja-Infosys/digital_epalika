<?php

namespace Modules\OrganizationRegistration\Entities;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\Settings\FiscalYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Support\Facades\Storage;
use Modules\BusinessRegistration\Entities\BusinessNature;
use Modules\BusinessRegistration\Entities\ObjectTransaction;

class Business extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'registration_date_en'
    ];

    protected $fillable = [
        'submissions_id',
        'registration_no',
        'registration_date',
        'registration_date_en',
        'fiscal_year_id',
        'tax_payer_number',
        'name',
        'business_start_date',
        'business_nature_id',
        'object_transaction_id',
        'province_id',
        'district_id',
        'local_body_id',
        'ward_no',
        'tole',
        'street_name',
        'house_number',
        'capital_investment',
        'working_capital',
        'fixed_capital',
        'board_size',
        'owner_name',
        'citizenship_number',
        'citizenship_issue_date',
        'citizenship_issue_district_id',
        'business_rent_owner',
        'owner_photo',
        'is_active',
        'address'
    ];

    public function fiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class);
    }

    public function businessNature(): BelongsTo
    {
        return $this->belongsTo(BusinessNature::class);
    }

    public function objectTransaction(): BelongsTo
    {
        return $this->belongsTo(ObjectTransaction::class);
    }

    public function CitizenshipIssueDistrict(): BelongsTo
    {
        return $this->belongsTo(District::class, 'citizenship_issue_district_id');
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function localBody(): BelongsTo
    {
        return $this->belongsTo(LocalBody::class, 'local_body_id');
    }

    public function setOwnerPhotoAttribute($value)
    {
        $this->attributes['owner_photo'] = $value->store('business/owner_photo', 'public');
    }

    public function getOwnerPhotoUrlAttribute(): string
    {
        return !empty($this->attributes['owner_photo']) ? Storage::disk('public')->url($this->attributes['owner_photo']) : '';
    }

    public function businessRenews(): HasMany
    {
        return $this->hasMany(BusinessRenew::class);
    }
}
