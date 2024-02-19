<?php

namespace Modules\EMap\Entities;

use App\Models\Address\District;
use App\Models\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class HouseOwner extends Model
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
        'status',
        'document',
        'photo'
    ];

    public function oldMaps(): BelongsToMany
    {
        return $this->belongsToMany(OldMap::class);
    }


    public function mapApplies(): BelongsToMany
    {
        return $this->belongsToMany(MapApply::class);
    }

    public function mapApply(): BelongsTo
    {
        return $this->belongsTo(MapApply::class);
    }

    public function citizenshipIssueDistrict(): BelongsTo
    {
        return $this->belongsTo(District::class, 'citizenship_issue_district_id');
    }

    public function files()
    {
        return $this->morphMany(File::class, 'model');
    }

    public function setDocumentAttribute($value)
    {
        if(!empty($value) && !is_string($value)) {
            $this->attributes['document'] = $value->store('houseOwnerArchive', 'public');
        }
    }
    public function getDocumentUrlAttribute($value)
    {

        return  $this->attributes['document'] ? Storage::disk('public')->url($this->attributes['document']) : '';

    }

    public function setPhotoAttribute($value): void
    {
        if(!empty($value) && !is_string($value)) {
            $this->attributes['photo'] = $value->store('e_map/house_owner/photo', 'public');
        }
    }
    public function getPhotoUrlAttribute($value): string
    {
        return  $this->attributes['photo'] ? Storage::disk('public')->url($this->attributes['photo']) : '';

    }
}
