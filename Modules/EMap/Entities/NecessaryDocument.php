<?php

namespace Modules\EMap\Entities;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class NecessaryDocument extends Model
{
    use HasFactory,SoftDeletes,EventObserveTrait;

   protected $dates = [
       'created_at',
       'updated_at',
       'deleted_at'
   ];

   protected $fillable = [
    'title',
    'description',
   ];
   public function files():MorphMany
   {
       return $this->MorphMany(File::class,'model');
   }
}
