<?php

namespace App\Models;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\UserManagement\Role;
use App\Traits\EventObserveTrait;
use App\Traits\LockableTrait;
use App\Traits\QueryFilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use SoftDeletes;
    use QueryFilterTrait;
    use EventObserveTrait;
    use LockableTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'role_id',
        'is_active',
        'password',
        'ward_no',
        'profile_photo_path',
        'pin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value): void
    {
        if (! empty($value)) {
            $this->attributes['password'] = bcrypt($value);
        }
    }

    public function setPinAttribute($value): void
    {
        if (! empty($value)) {
            $this->attributes['pin'] = bcrypt($value);
        }
    }

    public function getProfilePhotoUrlAttribute(): string
    {
        return $this->attributes['profile_photo_path']
            ? Storage::disk('public')->url($this->attributes['profile_photo_path'])
            : asset('images/user_icon.jpg');
    }

    public function setProfilePhotoPathAttribute($value)
    {
        if (! empty($value) && ! is_string($value)) {
            $this->attributes['profile_photo_path'] = $value->store('user/profile/'.Str::slug($this->attributes['name'], '_'), 'public');
        }
    }

    public function scopeFilter($query, $param = [])
    {
        $this->filterByUserRole($query, $param);

        return $query;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(__CLASS__);
    }

    public function users(): HasMany
    {
        return $this->hasMany(__CLASS__);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
