<?php

namespace Modules\EMap\Entities;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\File;
use App\Models\Settings\FiscalYear;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\EMap\Enums\BuildingDocumentationStatusEnum;
use Modules\EMap\Enums\BuildingTypeEnum;

class BuildingDocumentation extends Model
{
    use EventObserveTrait, HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'reg_no',
        'submission_no',
        'fiscal_year_id',
        'registration_no',
        'registration_date_ne',
        'registration_date_en',
        'house_owner_name',
        'applicant_name',
        'application_date',
        'province_id',
        'district_id',
        'local_body_id',
        'ward_no',
        'tole',
        'former_district',
        'former_local_body',
        'former_ward_no',
        'phone',
        'plot_no',
        'land_area',
        'land_ward_no',
        'house_built_year',
        'room',
        'storey',
        'area',
        'building_category',
        'length',
        'breadth',
        'height',
        'other',
        'road_jurisdiction',
        'land_detail',
        'bill_no',
        'bill_date_bs',
        'bill_date_ad',
        'taxpayer_number',
        'amount',
        'other_file',
        'status',
        'sent_admin',
    ];

    protected $casts = [
        'building_category' => BuildingTypeEnum::class,
        'status' => BuildingDocumentationStatusEnum::class,
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

    public function neighbours(): MorphMany
    {
        return $this->morphMany(Neighbour::class, 'neighbourable');
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
    public function landReport(): HasOne
    {
        return $this->hasOne(LandReport::class);
    }
}
