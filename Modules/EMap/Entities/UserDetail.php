<?php

namespace Modules\EMap\Entities;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'name_ne',
        'name_en',
        'email',
        'phone',
        'gender',
        'marital_status',
        'father_name',
        'grandfather_name',
        'pan_no',
        'nec_no',
        'nec_certificate',
        'citizenship_no',
        'citizenship_issued_district',
        'citizenship_issued_date',
        'citizenship_front',
        'citizenship_back',
        'permanent_province_id',
        'permanent_district_id',
        'permanent_local_body_id',
        'permanent_ward',
        'permanent_tole',
        'temporary_province_id',
        'temporary_district_id',
        'temporary_local_body_id',
        'temporary_ward',
        'temporary_tole',
        'organization_id',
    ];

    public function citizenshipIssuedDistrict(): BelongsTo
    {
        return $this->belongsTo(District::class, 'citizenship_issued_district');
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

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }
}
