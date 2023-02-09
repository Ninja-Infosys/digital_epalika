<?php

namespace Modules\OrganizationRegistration\Entities;

use App\Enums\DesignationTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class InstitutionOfficer extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $casts = [
        'officer_designation' => DesignationTypeEnum::class
    ];

    protected $fillable = [
        'institution_id',
        'officer_designation',
        'officer_name',
        'officer_citizenship_no',
        'officer_citizenship_issue_date',
        'officer_citizenship_issue_date_en',
        'officer_citizenship_issue_district',
        'officer_citizenship_issue_current_address',
        'officer_contact_detail',
        'officer_photo',
        'officer_citizenship_front',
        'officer_citizenship_behind',
    ];

    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class);
    }
}
