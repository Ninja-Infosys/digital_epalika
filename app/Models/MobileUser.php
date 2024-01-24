<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Modules\BusinessRegistration\Entities\BusinessDetail;
use Modules\EMap\Entities\MapApply;
use Modules\GrievanceHandling\Entities\GrievanceDetail;
use Modules\JudicialCommittee\Entities\ComplaintApplication;
use Modules\Recommendation\Entities\SipharishCreate;
use Modules\Roaster\Entities\Trainee;

class MobileUser extends Authenticatable
{
    use HasApiTokens;
    use Notifiable;
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'name',
        'email',
        'phone',
        'is_active',
        'password'
    ];
    protected $hidden = [
        'password',
        'remember_token'
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value): void
    {
        if (!empty($value)) {
            $this->attributes['password'] = bcrypt($value);
        }
    }

    public function getProfilePhotoUrlAttribute(): string
    {
        return $this->attributes['profile_photo_path']
            ? Storage::disk('public')->url($this->attributes['profile_photo_path'])
            : asset('images/user_icon.jpg');
    }

    /*   public function setProfilePhotoPathAttribute($value): void
       {
           if (!empty($value) && !is_string($value)) {
               $this->attributes['profile_photo_path'] = $value->store('user/profile/' . Str::slug($this->attributes['name'], '_'), 'public');
           }
       }*/

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function scopeNotActive($query)
    {
        return $query->where('is_active', 0);
    }

    public function mapApplies(): HasMany
    {
        return $this->hasMany(MapApply::class);
    }

    public function grievanceDetails(): HasMany
    {
        return $this->hasMany(GrievanceDetail::class);
    }

    public function businessDetails(): HasMany
    {
        return $this->hasMany(BusinessDetail::class);
    }

    public function complaintRegistrations(): HasMany
    {
        return $this->hasMany(ComplaintApplication::class);
    }

    public function trainees(): HasMany
    {
        return $this->hasMany(Trainee::class);
    }
    public function sipharishCreates(): HasMany
    {
        return $this->hasMany(SipharishCreate::class);
    }
}
