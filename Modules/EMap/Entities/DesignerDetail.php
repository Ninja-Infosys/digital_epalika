<?php

namespace Modules\EMap\Entities;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\EMap\Enums\PostsEnum;

class DesignerDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $with=['province','district','localBody'];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'map_apply_id',
        'name',
        'father_name',
        'grandfather_name',
        'phone',
        'address',
        'local_body',
        'ward_no',
        'post',
        'nec_council_no',
        'local_body_registration_no',
        'consulting_firm_name',
        'province_id',
        'district_id',
        'local_body_id',
        'tole'
    ];

    protected $casts = [
        'post' => PostsEnum::class,
    ];

    public function mapApply(): BelongsTo
    {
        return $this->belongsTo(MapApply::class);
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
}
