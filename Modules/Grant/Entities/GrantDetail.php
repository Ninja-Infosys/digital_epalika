<?php

namespace Modules\Grant\Entities;

use App\Models\Address\LocalBody;
use App\Models\Settings\OfficeSetting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Modules\Grant\Enums\NewOrContinueEnum;

class GrantDetail extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'grant_program_id',
        'grant_type_id',
        'local_body_id',
        'is_new',
        'ward_no',
        'village',
        'tole',
        'Unit_no',
        'phone',
        'investment',
        'remarks'
    ];

    protected $casts = [
        'is_new' => NewOrContinueEnum::class
    ];

    public function grantProgram(): BelongsTo
    {
        return $this->belongsTo(GrantProgram::class);
    }

    public function grantType(): BelongsTo
    {
        return $this->belongsTo(GrantType::class);
    }

    public function localBody(): BelongsTo
    {
        return $this->belongsTo(LocalBody::class);
    }

    public function officeSetting(): BelongsTo
    {
       return $this->belongsTo(OfficeSetting::class);
    }

}
