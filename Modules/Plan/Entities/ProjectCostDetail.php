<?php

namespace Modules\Plan\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class ProjectCostDetail extends Model
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
        'project_id',
        'estimated_total_cost',
        'federal_invest',
        'province_invest',
        'local_level_invest',
        'consumer_committee_invest',
        'ngo_invest',
        'foreign_donor_invest',
        'others_invest',
        'estimated_cost_excluding_vat',
        'benefited_organization',
        'others_benefited'
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
