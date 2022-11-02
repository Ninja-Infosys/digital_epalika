<?php

namespace Modules\EMap\Entities;

use App\Models\Address\District;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Modules\EMap\Enums\LandOwnerTypeEnum;

class LandOwner extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'map_apply_id',
        'land_owner_type',
        'name',
        'phone',
        'father_name',
        'grandfather_name',
        'citizenship_issue_district_id',
        'citizenship_no',
        'citizenship_issue_date',
        'address',
        'local_body',
        'ward_no',
    ];

    protected $casts = [
        'land_owner_type' => LandOwnerTypeEnum::class
    ];

    public function mapApply(): BelongsTo
    {
        return $this->belongsTo(MapApply::class);
    }

    public function citizenshipIssueDistrict(): BelongsTo
    {
        return $this->belongsTo(District::class, 'citizenship_issue_district_id');
    }
}
