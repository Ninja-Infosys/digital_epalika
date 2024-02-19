<?php

namespace Modules\EMap\Entities;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Modules\EMap\Enums\LandOwnerTypeEnum;

class LandOwner extends Model
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
        'photo',
        'province_id',
        'district_id',
        'local_body_id',
        'tole',
    ];

    protected $casts = [
        'land_owner_type' => LandOwnerTypeEnum::class,
    ];
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

    public function mapApply(): BelongsTo
    {
        return $this->belongsTo(MapApply::class);
    }

    public function mapApplies(): BelongsToMany
    {
        return $this->belongsToMany(MapApply::class);
    }

    public function citizenshipIssueDistrict(): BelongsTo
    {
        return $this->belongsTo(District::class, 'citizenship_issue_district_id');
    }

    public function setPhotoAttribute($value): void
    {
        if(!empty($value) && !is_string($value)) {
            $this->attributes['photo'] = $value->store('e_map/land_owner/photo', 'public');
        }
    }
    public function getPhotoUrlAttribute($value): string
    {
        return  $this->attributes['photo'] ? Storage::disk('public')->url($this->attributes['photo']) : '';

    }
}
