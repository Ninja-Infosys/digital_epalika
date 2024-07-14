<?php

namespace Modules\EMap\Entities;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Storage;

class BuildingLandOwner extends Model
{
    use HasFactory,SoftDeletes,EventObserveTrait;

    protected $with = ['province', 'district', 'localBody'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'building_documentation_id',
        'name',
        'phone',
        'father_name',
        'grandfather_name',
        'citizenship_issue_district_id',
        'citizenship_no',
        'citizenship_issue_date',
        'former_ward_no',
        'former_local_body',
        'ward_no',
        'document',
        'photo',
        'province_id',
        'district_id',
        'local_body_id',
        'tole',
        'signature',
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



    public function buildingDocumentations(): BelongsToMany
    {
        return $this->belongsToMany(BuildingDocumentation::class);
    }

    public function buildingDocumentation(): BelongsTo
    {
        return $this->belongsTo(BuildingDocumentation::class);
    }

    public function citizenshipIssueDistrict(): BelongsTo
    {
        return $this->belongsTo(District::class, 'citizenship_issue_district_id');
    }

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'model');
    }

    public function setDocumentAttribute($value): void
    {
        if (! empty($value) && ! is_string($value)) {
            $this->attributes['document'] = $value->store('buildingLandOwnerArchive', 'public');
        }
    }

    public function getDocumentUrlAttribute($value): string
    {

        return $this->attributes['document'] && Storage::disk('public')->exists($this->attributes['document']) ? Storage::disk('public')->url($this->attributes['document']) : '';

    }

    public function setPhotoAttribute($value): void
    {
        if (! empty($value) && ! is_string($value)) {
            $this->attributes['photo'] = $value->store('e_map/buildingDocumentation/land_owner/photo', 'public');
        }
    }

    public function getPhotoUrlAttribute($value): string
    {
        return $this->attributes['photo'] && Storage::disk('public')->exists($this->attributes['photo']) ? Storage::disk('public')->url($this->attributes['photo']) : '';

    }
    public function setSignatureAttribute($value): void
    {
        if (! empty($value) && ! is_string($value)) {
            $this->attributes['signature'] = $value->store('e_map/buildingDocumentation/land_owner/signature', 'public');
        }
    }

    public function getSignatureUrlAttribute($value): string
    {
        return $this->attributes['signature'] && Storage::disk('public')->exists($this->attributes['signature']) ? Storage::disk('public')->url($this->attributes['photo']) : '';

    }
}
