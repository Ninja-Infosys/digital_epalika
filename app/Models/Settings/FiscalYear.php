<?php

namespace App\Models\Settings;

use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Circular\Entities\Dispatch;
use Modules\Circular\Entities\Registration;
use Modules\DigitalBoard\Entities\Notice;

class FiscalYear extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'title'
    ];

    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class);
    }

    public function dispatch(): HasMany
    {
        return $this->hasMany(Dispatch::class);
    }

    public function notices(): HasMany
    {
        return $this->hasMany(Notice::class);
    }
}
