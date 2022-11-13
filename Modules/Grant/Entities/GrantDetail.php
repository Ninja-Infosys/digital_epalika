<?php

namespace Modules\Grant\Entities;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\Settings\FiscalYear;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrantDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    use EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'fiscal_year_id',
        'grant_program_id',
        'grant_recipient_name',
        'grant_recipient_code_no',
        'province_id',
        'district_id',
        'local_body_id',
        'ward_no',
        'tole',
        'grant_recipient_type',
        'grant_type_id',
        'grant_activity_id',
        'total_cost',
        'grant_amount',
        'investment_amount',
        'beneficial_area',
        'contact_person_name',
        'phone',
        'is_continuity',
        'prev_fiscal_year_id',
        'prev_cost_amount',
        'beneficial_places',
        'remarks',
    ];

    public function fiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class);
    }

    public function grantProgram(): BelongsTo
    {
        return $this->belongsTo(GrantProgram::class);
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

    public function grantType(): BelongsTo
    {
        return $this->belongsTo(GrantType::class);
    }

    public function grantActivity(): BelongsTo
    {
        return $this->belongsTo(GrantActivity::class);
    }

    public function prevFiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class, 'prev_fiscal_year_id');
    }
}
