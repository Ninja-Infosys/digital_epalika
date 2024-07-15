<?php

namespace Modules\EMap\Entities;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\File;
use App\Models\Settings\FiscalYear;
use App\Traits\EventObserveTrait;
use App\Traits\NepaliDateConverter;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Modules\EMap\Enums\ApplicantTypeEnum;
use Modules\EMap\Enums\BuildingDocumentationStatusEnum;
use Modules\EMap\Enums\BuildingTypeEnum;
use Modules\EMap\Enums\BuildingUsageEnum;
use Modules\EMap\Enums\RoofTypeEnum;

class BuildingDocumentation extends Model
{
    use EventObserveTrait, HasFactory, SoftDeletes;
    use NepaliDateConverter;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'sent_to_admin_at',
    ];

    protected $fillable = [
        'submission_no',
        'fiscal_year_id',
        'organization_id',
        'registration_no',
        'registration_date',
        'former_local_body',
        'former_ward_no',
        'land_ward_no',
        'plot_no',
        'land_tole',
        'land_area',
        'house_built_year',
        'applicant_name',
        'applicant_signature',
        'province_id',
        'district_id',
        'local_body_id',
        'applicant_ward_no',
        'applicant_tole',
        'applicant_phone_no',
        'applicant_age',
        'application_date',
        'building_usage',
        'field_land_area',
        'applicant_type',
        'plinth_area',
        'other_construction_area_new',
        'other_construction_area_old',
        'total_area',
        'current_storey',
        'height',
        'building_category',
        'roof_category',
        'set_back',
        'consultant_engineer_signature',
        'consultant_engineer_name',
        'consultant_engineer_post',
        'consultancy_name',
        'consultancy_registration_no',
        'consultancy_stamp',
        'n_e_c_registration_no',
        'land_detail',
        'room',
        'sent_to_organization',
        'sent_to_admin_at',
    ];

    protected $casts = [
        'building_category' => BuildingTypeEnum::class,
        'building_usage' => BuildingUsageEnum::class,
        'roof_category' => RoofTypeEnum::class,
        'status' => BuildingDocumentationStatusEnum::class,
        'applicant_type' => ApplicantTypeEnum::class,
    ];



    public function requiredDocument(): HasOne
    {
        return $this->hasOne(RequiredDocument::class);
    }
    public function fiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class);
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

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'model');
    }


    public function neighbours(): HasMany
    {
        return $this->hasMany(Neighbour::class);
    }
    public function getRegistrationMonthAttribute(): string
    {
        return explode('-', $this->registration_date_ne)[1] ?? '';
    }

    public function isRegistrationDateMoreThanAWeekOld()
    {
        $registrationDate = new \DateTime($this->bill_date_ad);
        $oneWeekLater = (clone $registrationDate)->modify('+7 days');
        $now = new \DateTime();

        return $now > $oneWeekLater;
    }

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function buildingStoreyDetails(): HasMany
    {
        return $this->hasMany(BuildingStoreyDetail::class);
    }
    public function buildingDescriptions(): HasMany
    {
        return $this->hasMany(BuildingDescription::class);
    }
    public function storeyDescriptions(): HasMany
    {
        return $this->hasMany(StoreyDescription::class);
    }

    public function buildingDocuments(): HasMany
    {
        return $this->hasMany(BuildingDocument::class);
    }
    public function contractorDetails(): HasMany
    {
        return $this->hasMany(ContractorDetail::class);
    }

    public function buildingHouseOwner(): HasOne
    {
        return $this->hasOne(BuildingHouseOwner::class);
    }
    public function buildingLandOwner(): HasOne
    {
        return $this->hasOne(BuildingLandOwner::class);
    }
    public function setApplicantSignatureAttribute($value): void
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['applicant_signature'] = $value->store('e_map/buildingDocumentation/applicant_signature', 'public');
        }
    }

    public function getApplicantSignatureUrlAttribute(): string
    {
        return $this->attributes['applicant_signature'] ? Storage::disk('public')->url($this->attributes['applicant_signature']) : '';
    }

    public function setConsultantEngineerSignatureAttribute($value): void
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['consultant_engineer_signature'] = $value->store('e_map/buildingDocumentation/house_owner/consultant_engineer_signature', 'public');
        }
    }

    public function getConsultantEngineerSignatureUrlAttribute(): string
    {
        return $this->attributes['consultant_engineer_signature'] ? Storage::disk('public')->url($this->attributes['consultant_engineer_signature']) : '';
    }


    public function applyBuildingNotices(): HasMany
    {
        return $this->hasMany(ApplyBuildingNotice::class);
    }
    public function scopeSentToAdmin($query)
    {
        return $query->whereNotNull('sent_to_admin_at');
    }
    public function scopeNotSentToAdmin($query)
    {
        return $query->whereNull('sent_to_admin_at');
    }
    public function getIndexDataAttribute()
    {
        $this->load('buildingDocuments.buildingDocumentationStep');
        $storedDocuments = collect();

        $storedDocuments =
            $storedDocuments
            ->merge($this->buildingDocuments)
            ->sortByDesc('created_at');

        return $storedDocuments
            ->map(function ($storedDocument) {
                return collect($storedDocument)
                    ->put('desk', $storedDocument?->buildingDocumentationStep?->load('group')?->group?->title)
                    ->put('form_title', $storedDocument->buildingDocumentationStep?->title)
                    ->only('desk', 'created_at', 'form_title', 'status')
                    ->toArray();
            })
            ->map(function ($form) {
                return [
                    'desk' => $form['desk'] ?? '',
                    'title' => $form['form_title'] ?? '',
                    'pendingDays' => (array_key_exists('created_at', $form) && !empty($form['created_at'])) ? Carbon::parse($form['created_at'])?->diffForHumans() : $this->created_at->diffForHumans(),
                    'status' => $form['status'],
                ];
            })
            ->first();
    }
}
