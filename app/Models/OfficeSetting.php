<?php

namespace App\Models;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class OfficeSetting extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'name',
        'logo',
        'google_map',
        'province_id',
        'district_id',
        'local_body_id',
        'ward_no',
        'phone',
        'email',
        'website',
        'facebook_link'
    ];

    public function setLogoAttribute($value)
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['logo'] = $value->store('office_setting/logo', 'public');
        }
    }

    public function getLogoUrlAttribute(): string
    {
        return $this->attributes['logo'] ? Storage::disk('public')->url($this->attributes['logo']) : '';
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
