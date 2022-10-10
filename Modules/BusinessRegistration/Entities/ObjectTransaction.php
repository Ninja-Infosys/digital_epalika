<?php

namespace Modules\BusinessRegistration\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class ObjectTransaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'title',
    ];

    public function objectTransactionSubCategories()
    {
        return $this->hasMany(ObjectTransactionSubCategory::class);
    }
    public function businessDetails(): BelongsToMany
    {
        return $this->belongsToMany(BusinessDetail::class);
    }
}
