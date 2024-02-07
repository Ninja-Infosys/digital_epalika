<?php

namespace Modules\EMap\Entities;

use App\Models\Address\District;
use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class HouseOwnerArchive extends Model
{
    use HasFactory;
    use SoftDeletes;
    use EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
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
    ];

    public function mapApply()
    {
        return $this->belongsTo(MapApply::class);
    }

    public function files(): MorphMany
    {
        return $this->morphMany(File::class,'model');
    }

    public function citizenshipIssueDistrict(): BelongsTo
    {
        return $this->belongsTo(District::class, 'citizenship_issue_district_id');
    }
}
