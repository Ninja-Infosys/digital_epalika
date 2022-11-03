<?php

namespace Modules\Roaster\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class TrainerExperience extends Model
{
    use HasFactory,SoftDeletes;

   protected $dates = [
       'created_at',
       'updated_at',
       'deleted_at'
   ];

   protected $fillable = [
       'trainer_id',
       'designation_id',
       'office',
       'responsibility',
       'from',
       'to',
       'remarks',
   ];


    public function trainer(): BelongsTo
    {
        return $this->belongsTo(Trainer::class);
    }

    public function designation(): BelongsTo
    {
        return $this->belongsTo(Designation::class);
    }
}
