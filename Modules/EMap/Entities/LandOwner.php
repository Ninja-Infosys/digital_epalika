<?php

namespace Modules\EMap\Entities;

use App\Models\Address\District;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class LandOwner extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

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
        'citizenship_issue_district_id',
        'citizenship_no',
        'citizenship_issue_date',
        'address'
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
