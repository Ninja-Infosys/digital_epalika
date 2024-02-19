<?php

namespace Modules\EMap\Entities;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Modules\EMap\Enums\ApplicantTypeEnum;
use Modules\EMap\Enums\RelationEnum;

class ApplicantDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'map_apply_id',
        'applicant_type',
        'relation_with_owner',
        'name',
        'address',
        'phone',
        'father_name',
        'citizenship_issue_district_id',
        'citizenship_no',
        'citizenship_issue_date',
        'application_date',
        'signature',
        'province_id',
        'district_id',
        'local_body_id',
        'ward_no',
        'tole'
    ];

    protected $casts = [
        'applicant_type' => ApplicantTypeEnum::class,
        'relation_with_owner' => RelationEnum::class,
    ];

    protected $with=[
        'province',
        'district',
        'localBody'
    ];

    public function mapApply(): BelongsTo
    {
        return $this->belongsTo(MapApply::class);
    }

    public function citizenshipIssueDistrict(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function getSignatureUrlAttribute(): string
    {
        return $this->attributes['signature'] ? Storage::disk('public')->url($this->attributes['signature']) : '';
    }

    public function setSignatureAttribute($value)
    {
        if (!empty($value) && $value instanceof UploadedFile) {
            $this->attributes['signature'] = $value->store('e_map/applicant/'.Str::slug($this->attributes['name'], '_').'/signature', 'public');
        }
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
}
