<?php

namespace Modules\EMap\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\EMap\Enums\StoreyTypeEnum;

class StoreyDescription extends Model
{
    use HasFactory,SoftDeletes,EventObserveTrait;

   protected $dates = [
       'created_at',
       'updated_at',
       'deleted_at'
   ];

   protected $fillable = [
    'building_documentation_id',
    'height',
    'width',
    'length',
    'storey',
];

protected $casts = [
    'storey' => StoreyTypeEnum::class,
];
public function buildingDocumentation(): BelongsTo
{
    return $this->belongsTo(BuildingDocumentation::class);
}
}
