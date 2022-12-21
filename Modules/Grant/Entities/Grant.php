<?php

namespace Modules\Grant\Entities;

use App\Models\Settings\Branch;
use App\Models\Settings\FiscalYear;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Modules\Grant\Enums\GranteeEnum;

class Grant extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'fiscal_year_id',
        'grant_type_id',
        'grant_office_id',
        'grant_program_id',
        'branch_id',
        'grant_amount',
        'grant_for',
        'other',
        'main_activity',
        'remarks',
        'user_id',
    ];

    protected function grantFor(): Attribute
    {
        return new Attribute(
            get: fn($value) => explode(",",$value),

            set: fn($value) => implode(",", $value),
        );
    }

    public function grantProgram(): BelongsTo
    {
        return $this->belongsTo(GrantProgram::class);
    }

    public function grantOffice(): BelongsTo
    {
        return $this->belongsTo(GrantOffice::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function fiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class);
    }

    public function grantType(): BelongsTo
    {
        return $this->belongsTo(GrantType::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

//    public function grantDetails(): HasMany
//    {
//        return $this->hasMany(GrantDetail::class);
//    }
}
