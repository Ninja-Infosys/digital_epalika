<?php

namespace Modules\GrievanceHandling\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrievanceType extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'title',
        'grievance_status'
    ];

    public function grievanceDetails(): HasMany
    {
        return $this->hasMany(GrievanceDetail::class);
    }
}
