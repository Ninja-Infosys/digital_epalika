<?php

namespace Modules\Revenue\Entities;

use App\Enums\Gender;
use App\Models\Settings\FiscalYear;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class TaxPayer extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'tax_payer_type_id',
        'fiscal_year_id',
        'user_id',
        'registration_no',
        'name',
        'name_en',
        'phone',
        'email',
        'address',
        'gender',
        'father_name',
        'grandfather_name',
        'citizenship_no',
        'issued_district',
        'issued_date',
        'ward',
        'tole',
        'remarks',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'gender' => Gender::class
    ];

    public function taxPayerType(): BelongsTo
    {
        return $this->belongsTo(TaxPayerType::class, 'tax_payer_type_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function fiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeNotActive($query)
    {
        return $query->where('is_active', false);
    }
}
