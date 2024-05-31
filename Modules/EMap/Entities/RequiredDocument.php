<?php

namespace Modules\EMap\Entities;

use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequiredDocument extends Model
{
    use EventObserveTrait, HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'citizenship',
        'landowner_proved',
        'revenue',
        'building_map',
        'land_map',
        'all_round_house_pic',
        'photo',
        'other',
    ];
}
