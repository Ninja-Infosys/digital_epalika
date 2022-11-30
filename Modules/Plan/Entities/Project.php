<?php

namespace Modules\Plan\Entities;

use App\Models\Settings\FiscalYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Modules\Plan\Enums\ProjectOperatedThroughEnum;
use Modules\Plan\Enums\ProjectStatusEnum;

class Project extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'registration_no',
        'fiscal_year_id',
        'project_name',
        'plan_area_id',
        'project_status',
        'project_start_date',
        'project_completion_date',
        'plan_level_id',
        'ward_no',
        'budget_source_id',
        'budget_head_id',
        'allocated_amount',
        'project_venue',
        'evaluation_amount',
        'purpose',
        'operated_through',
        'is_deadline_extended',
        'extended_date',
        'progress_spent_amount',
        'physical_progress_target',
        'physical_progress_completed',
        'physical_progress_unit'
    ];

    protected $casts = [
        'project_status' => ProjectStatusEnum::class,
        'operated_through' => ProjectOperatedThroughEnum::class
    ];

    public function fiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class);
    }

    public function planArea(): BelongsTo
    {
        return $this->belongsTo(PlanArea::class);
    }

    public function planLevel(): BelongsTo
    {
        return $this->belongsTo(PlanLevel::class);
    }

    public function budgetSource(): BelongsTo
    {
        return $this->belongsTo(BudgetSource::class);
    }

    public function budgetHead(): BelongsTo
    {
        return $this->belongsTo(BudgetHead::class);
    }

    public function projectCostDetail(): HasOne
    {
        return $this->hasOne(ProjectCostDetail::class);
    }

    public function projectGrantDetails(): HasMany
    {
        return $this->hasMany(ProjectGrantDetail::class);
    }

    public function benefitedMemberDetails(): HasMany
    {
        return $this->hasMany(BenefitedMemberDetail::class);
    }

    public function consumerCommittee(): HasOne
    {
        return $this->hasOne(ConsumerCommittee::class);
    }

    public function projectInstallmentDetails(): HasMany
    {
        return $this->hasMany(ProjectInstallmentDetail::class);
    }
}
