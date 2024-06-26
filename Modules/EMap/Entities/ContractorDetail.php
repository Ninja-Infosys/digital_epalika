<?php

namespace Modules\EMap\Entities;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class ContractorDetail extends Model
{
    use HasFactory,SoftDeletes,EventObserveTrait;

    protected $with=['province','district','localBody'];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'building_documentation_id',
        'contractor_name',
        'contractor_signature',
        'address',
        'ward_no',
        'tole',

    ];

    public function buildingDocumentation(): BelongsTo
    {
        return $this->belongsTo(BuildingDocumentation::class);
    }

  


    public function setContractorSignatureAttribute($value): void
    {
        if (! empty($value) && ! is_string($value)) {
            $this->attributes['contractor_signature'] = $value->store('e_map/buildingDocumentation/house_owner/contractor_signature', 'public');
        }
    }

    public function getContractorSignatureUrlAttribute($value): string
    {
        return $this->attributes['contractor_signature'] && Storage::disk('public')->exists($this->attributes['contractor_signature']) ? Storage::disk('public')->url($this->attributes['photo']) : '';

    }
}
