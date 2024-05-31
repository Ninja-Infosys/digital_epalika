<?php

namespace Modules\EMap\Entities;

use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    ];
}
