<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmergencyCategory extends Model
{
    use HasFactory,SoftDeletes,EventObserveTrait;

    protected $dates=[
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'title',
    ];

    public function emergencyNumbers(): HasMany
    {
        return $this->hasMany(EmergencyNumber::class);
    }
}
