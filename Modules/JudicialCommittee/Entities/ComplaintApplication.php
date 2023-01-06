<?php

namespace Modules\JudicialCommittee\Entities;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\Settings\FiscalYear;
use App\Traits\EventObserveTrait;
use App\Traits\GetAllColumns;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Modules\JudicialCommittee\Traits\JudicialCommitteeTemplateTrait;

class ComplaintApplication extends Model
{
    use HasFactory;
    use SoftDeletes;
    use JudicialCommitteeTemplateTrait;
    use EventObserveTrait;
    use GetAllColumns;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'fiscal_year_id',
        'submission_no',
        'registration_no',
        'lawsuit_nature_id',
        'complainant_province_id',
        'complainant_district_id',
        'complainant_local_body_id',
        'complainant_ward_no',
        'complainant_tole',
        'complainant_guardian_name',
        'complainant_relationship',
        'complainant_age',
        'complainant_name',
        'defendant_province_id',
        'defendant_district_id',
        'defendant_local_body_id',
        'defendant_ward_no',
        'defendant_tole',
        'defendant_guardian_name',
        'defendant_relationship',
        'defendant_age',
        'defendant_name',
        'subject',
        'complaint_detail',
        'date',
        'en_date',
        'applicant_name',
        'applicant_phone',
        'applicant_address',
        'applicant_signature',
    ];

    protected $appends=[
        'month',
        'en_month'
    ];

    public function getApplicantSignatureUrlAttribute(): string
    {
        return !empty($this->attributes['applicant_signature'])
            ? Storage::disk('public')->url($this->attributes['applicant_signature'])
            : '';
    }

    public function setApplicantSignatureAttribute($value)
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['applicant_signature'] = $value->store('judicial_committee/applicant_signature', 'public');
        }
    }

    public function getMonthAttribute(): string
    {
        return explode('-', $this->date)[1] ?? '';
    }

    public function getEnMonthAttribute(): string
    {
        return explode('-', $this->en_date)[1] ?? '';
    }

    public function fiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class);
    }

    public function lawsuitNature(): BelongsTo
    {
        return $this->belongsTo(LawsuitNature::class);
    }

    public function complainantProvince(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'complainant_province_id');
    }

    public function complainantDistrict(): BelongsTo
    {
        return $this->belongsTo(District::class, 'complainant_district_id');
    }

    public function complainantLocalBody(): BelongsTo
    {
        return $this->belongsTo(LocalBody::class, 'complainant_local_body_id');
    }

    public function defendantProvince(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'defendant_province_id');
    }

    public function defendantDistrict(): BelongsTo
    {
        return $this->belongsTo(District::class, 'defendant_district_id');
    }

    public function defendantLocalBody(): BelongsTo
    {
        return $this->belongsTo(LocalBody::class, 'defendant_local_body_id');
    }

    public function judicialReceiptBill(): HasOne
    {
        return $this->hasOne(JudicialReceiptBill::class);
    }

    public function relatedMembers(): HasMany
    {
        return $this->hasMany(RelatedMember::class);
    }

    public function dateSheets(): HasMany
    {
        return $this->hasMany(DateSheet::class);
    }

    public function defendantIssuedDeadlines(): HasMany
    {
        return $this->hasMany(DefendantIssuedDeadline::class);
    }

    public function dateCompensation(): HasOne
    {
        return $this->hasOne(DateCompensation::class);
    }

    public function writtenAnswers(): HasMany
    {
        return $this->hasMany(WrittenAnswer::class);
    }
}
