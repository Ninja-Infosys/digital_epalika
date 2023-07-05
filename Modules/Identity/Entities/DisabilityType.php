<?php

namespace Modules\Identity\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class DisabilityType extends Model
{
    use HasFactory;
    use SoftDeletes;
    use EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'title',
        'title_en'
    ];

    public function disabilityIdentityCards(): HasMany
    {
        return $this->hasMany(DisabilityIdentityCard::class);
    }
}
