<?php

namespace Modules\JudicialCommittee\Entities;

use App\Enums\Gender;
use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\Settings\Designation;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class JudicialMember extends Model
{
    use HasFactory;
    use SoftDeletes;
    use EventObserveTrait;

    protected $dates = [
        'en_dob',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'photo',
        'position',
        'designation_id',
        'phone',
        'province_id',
        'district_id',
        'local_body_id',
        'ward_no',
        'tole',
        'gender',
        'dob',
        'en_dob',
        'blood_group',
        'father_name',
        'mother_name',
        'grandfather_name',
        'status',
    ];

    protected $casts = [
        'gender' => Gender::class,
    ];

    public function getPhotoUrlAttribute(): string
    {
        return ! empty($this->attributes['photo'])
            ? Storage::disk('public')->url($this->attributes['photo'])
            : asset('images/user_icon.jpg');
    }

    public function getAddressAttribute(): array
    {
        return [
            'province_id' => $this->attributes['province_id'],
            'district_id' => $this->attributes['district_id'],
            'local_body_id' => $this->attributes['local_body_id'],
            'ward_no' => $this->attributes['ward_no'],
        ];
    }

    public function setPhotoAttribute($value)
    {
        if (! empty($value) && ! is_string($value)) {
            $this->attributes['photo'] = $value->store('judicial_committee/chief_members', 'public');
        }
    }

    public function designation(): BelongsTo
    {
        return  $this->belongsTo(Designation::class);
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
