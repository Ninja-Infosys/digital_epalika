<?php

namespace Modules\EMap\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class MapApply extends Model
{
    use HasFactory,SoftDeletes;

   protected $dates = [
       'created_at',
       'updated_at',
       'deleted_at'
   ];

   protected $fillable = [

   ];
}
