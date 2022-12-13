<?php

namespace Modules\GrievanceHandling\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrievanceUser extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'password',
    ];

    public function setPasswordAttribute($value): void
    {
        if (! empty($value)) {
            $this->attributes['password'] = bcrypt($value);
        }
    }

    public function grievanceDetails(): HasMany
    {
        return $this->hasMany(GrievanceDetail::class);
    }
}
