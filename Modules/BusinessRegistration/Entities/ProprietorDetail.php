<?php

namespace Modules\BusinessRegistration\Entities;

use App\Enums\Gender;
use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\BusinessRegistration\Enums\BusinessTypeEnum;
use Modules\BusinessRegistration\Enums\Qualification;

class ProprietorDetail extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'business_detail_id',
        'name',
        'citizenship_no',
        'issue_date',
        'issue_district_id',
        'phone',
        'email',
        'province_id',
        'district_id',
        'local_body_id',
        'ward_no',
        'way',
        'tole',
        'house_no',
        'account_no',
        'national_card_no',
        'gender',
        'education_qualification',
        'occupation',
    ];

    protected $casts = [
        'gender' => Gender::class,
        'education_qualification' => Qualification::class,
        'business_type' => BusinessTypeEnum::class
    ];

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
        return $this->belongsTo(District::class);
    }

    public function localBody(): BelongsTo
    {
        return $this->belongsTo(LocalBody::class);
    }

    public function threeGenerationDetails(): HasMany
    {
        return $this->hasMany(ThreeGenerationDetail::class);
    }

    public function businessDetail(): BelongsTo
    {
        return $this->belongsTo(BusinessDetail::class);
    }
}
