<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;


class MobileUser extends Authenticatable
{
    use HasApiTokens;
    use Notifiable;
    use SoftDeletes;

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
}
