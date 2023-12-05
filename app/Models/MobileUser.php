<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use App\Traits\QueryFilterTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MobileUser extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use SoftDeletes;
    use QueryFilterTrait;
    use EventObserveTrait;

    protected $dates=[
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable=[
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

    // public function getProfilePhotoUrlAttribute(): string
    // {
    //     return $this->attributes['profile_photo_path']
    //         ? Storage::disk('public')->url($this->attributes['profile_photo_path'])
    //         : asset('images/user_icon.jpg');
    // }

    // public function setProfilePhotoPathAttribute($value): void
    // {
    //     if (!empty($value) && !is_string($value)) {
    //         $this->attributes['profile_photo_path'] = $value->store('user/profile/' . Str::slug($this->attributes['name'], '_'), 'public');
    //     }
    // }

    // public function userDetail(): HasOne
    // {
    //     return $this->hasOne(UserDetail::class);
    // }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function scopeNotActive($query)
    {
        return $query->where('is_active', 0);
    }


}
