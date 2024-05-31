<?php

namespace Modules\EMap\Entities;

use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BuildingDocumentation extends Model
{
    use EventObserveTrait,HasFactory,SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'house_owner_name',
        'applicant_name',
        'application_date',
        'province_id',
        'district_id',
        'local_body_id',
        'ward_no',
        'tole',
        'former_province_id',
        'former_district_id',
        'former_local_body_id',
        'former_ward_no',
        'former_tole',
        'phone',
        'plot_no',
        'land_area',
        'house_start_date',
        'house_end_date',
        'room',
        'storey',
        'area',
        'building_category',
        'length',
        'breadth',
        'height',
        'road_jurisdiction',
        'land_detail',
    ];
}
