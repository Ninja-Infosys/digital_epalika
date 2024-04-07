<?php

namespace Modules\Recommendation\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SipharisSetting extends Model
{
    use HasFactory,SoftDeletes,EventObserveTrait;

   protected $dates = [
       'created_at',
       'updated_at',
       'deleted_at'
   ];

   
   protected $fillable = [
    'ward',
    'approver_id',
    'checker_id',
   ];
  

   protected function ward(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => explode(',', $value),
            set: fn(string|array|null $value) => !empty($value) ? is_array($value) ? implode(',', $value) : $value : null,
        );
    }

   public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
 
   public function approver()
    {
        return $this->belongsTo(User::class, 'approver_id');
    }

    public function checker()
    {
        return $this->belongsTo(User::class, 'checker_id');
    }
}
