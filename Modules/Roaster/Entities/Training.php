<?php

namespace Modules\Roaster\Entities;

use App\Models\Settings\FiscalYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class Training extends Model
{
    use HasFactory,SoftDeletes,EventObserveTrait;

   protected $dates = [
       'created_at',
       'updated_at',
       'deleted_at'
   ];

   protected $fillable = [
       'name',
       'open_date',
       'closed_date',
       'form_type',
       'closed_at',
       'aim',
       'description',
       'places',
       'pre_max_mark',
       'pre_min_mark',
       'pre_average_mark',
       'post_max_mark',
       'post_min_mark',
       'post_average_mark',
       'fiscal_year_id',
       'included_subjects'
   ];

    public function trainingTrainees(): HasMany
    {
        return $this->hasMany(TrainingTrainee::class);
    }

    public function getFormStatusAccordingToDateAttribute(): bool
    {
        return ($this->attributes['open_date'] <= now() && now() <= $this->attributes['closed_date']);
    }

    public function fiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class);
    }

    public function trainers(): BelongsToMany
    {
        return $this->belongsToMany(Trainer::class);
    }

    public function documents(): MorphMany
    {
        return $this->morphMany(Document::class, 'model');
    }
}
