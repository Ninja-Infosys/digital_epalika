<?php

namespace Modules\Grant\Entities;

use App\Enums\Gender;
use App\Enums\MaritalStatusEnum;
use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Modules\EMap\Enums\RelationEnum;

class Farmer extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'unique_id',
        'first_name',
        'middle_name',
        'last_name',
        'photo',
        'gender',
        'marital_status',
        'spouse_name',
        'father_name',
        'grandfather_name',
        'citizenship_no',
        'farmer_id_card_no',
        'national_id_card_no',
        'phone_no',
        'province_id',
        'district_id',
        'local_body_id',
        'ward_no',
        'village',
        'tole',
        'user_id',
    ];

    protected $casts = [
        'gender' => Gender::class,
        'marital_status' => MaritalStatusEnum::class
    ];

    public function getPhotoUrlAttribute(): string
    {
        return !empty($this->attributes['photo']) ?
            Storage::disk('public')->url($this->attributes['photo'])
            : asset('images/default.png');
    }

    public function setPhotoAttribute($value)
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['photo'] = $value->store('farmer/' . Str::slug($this->attributes['first_name'] . $this->attributes['last_name'], '_') . 'photo', 'public');
        }
    }

    public function getNameAttribute(): string
    {
        return (!empty($this->attributes['first_name']) ? ($this->attributes['first_name'] ?? '') . " " : "")
            . (!empty($this->attributes['middle_name']) ? ($this->attributes['middle_name'] ?? '') . " " : "")
            . (!empty($this->attributes['last_name']) ? ($this->attributes['last_name'] ?? '') : "");
    }

    public function scopeFilter($query, $param = [])
    {
        //filter by user role
        $this->filterByUserRole($query, $param);

        //filter by address
        $this->filterByAddress($query, $param);

        if (!empty($param['gender'])) {
            if (is_array($param['gender'])) {
                $query->whereIn('gender', $param['gender']);
            } else {
                $query->where('gender', $param['gender']);
            }
        }

        if (!empty($param['relationship_status'])) {
            if (is_array($param['relationship_status'])) {
                $query->whereIn('relationship_status', $param['relationship_status']);
            } else {
                $query->where('relationship_status', $param['relationship_status']);
            }
        }
        if (!empty($param['search'])) {
            $key = '%' . trim($param['search']) . '%';
            $query->where('unique_id', 'like', $key)
                ->orWhere('first_name', 'like', $key)
                ->orWhere('middle_name', 'like', $key)
                ->orWhere('last_name', 'like', $key)
                ->orWhere('email', 'like', $key)
                ->orWhere('phone', 'like', $key);
        }

        return $query;
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class);
    }

    public function enterprises(): BelongsToMany
    {
        return $this->belongsToMany(Enterprise::class);
    }

    public function cooperatives(): BelongsToMany
    {
        return $this->belongsToMany(Cooperative::class);
    }

//    public function grantDetails(): MorphMany
//    {
//        return $this->morphMany(GrantDetail::class, 'model');
//    }
}

