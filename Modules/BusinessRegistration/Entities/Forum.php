<?php

namespace Modules\BusinessRegistration\Entities;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\File;
use App\Models\Settings\FiscalYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class Forum extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'reg_no',
        'submission_no',
        'fiscal_year_id',
        'registration_no',
        'registration_date_ne',
        'registration_date_en',
        'name',
        'name_en',
        'owner_name',
        'phone',
        'email',
        'address',
        'address_en',
        'purpose',
        'province_id',
        'district_id',
        'local_body_id',
        'ward_no',
        'way',
        'tole',
        'investment',
        'east',
        'west',
        'north',
        'south',
        'plot_no',
        'area',
        'establish_date',
        'product',
        'application_date',
        'application_date_en',
        'bill_no',
        'bill_date_bs',
        'bill_date_ad',
        'taxpayer_number',
        'amount',
        'other',
        'other_file',
    ];

    protected $appends = [
        'is_register',
        'registration_month'
    ];

    public function getIsRegisterAttribute(): bool
    {
        if ($this->registeredBusinesses !== null) {
            return $this->registeredBusinesses->count() > 0;
        }
        return false;
    }

    public function fiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class);
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function localBody(): BelongsTo
    {
        return $this->belongsTo(LocalBody::class);
    }

    public function partners(): MorphMany
    {
        return $this->morphMany(Partner::class, 'businessable');
    }

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'model');
    }

    public function getRegistrationMonthAttribute(): string
    {
        return explode('-', $this->registration_date_ne)[1] ?? '';
    }
    public function forumRenew(): HasMany
    {
        return $this->hasMany(ForumRenew::class);
    }
}
