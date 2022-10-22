<?php

namespace Modules\ExecutiveMeeting\Entities;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WardCommittee extends Model
{
    use HasFactory, SoftDeletes,EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'name',
        'designation',
        'phone',
        'photo',
        'email',
        'province_id',
        'district_id',
        'local_body_id',
        'ward_no',
        'village',
        'tole',
        'position'
    ];

    public function getPhotoUrlAttribute(): string
    {
        return $this->attributes['photo']
            ? Storage::disk('public')->url($this->attributes['photo'])
            : asset('images/user_icon.jpg');
    }

    public function setPhotoAttribute($value)
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['photo'] = $value->store('ward_committee/' . Str::slug($this->attributes['name'], '_'), 'public');
        }
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
