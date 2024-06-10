<?php

namespace Modules\EMap\Entities;

use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\EMap\Enums\NeighbourTypeEnum;

class Neighbour extends Model
{
    use EventObserveTrait,HasFactory,SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'neighbour_name',
        'direction',
        'ward_no',
        'plot_no'
    ];
    protected $casts = [
        'direction' => NeighbourTypeEnum::class,
    ];


    public function neighbourable(): MorphTo
    {
        return $this->morphTo();
    }
}
