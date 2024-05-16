<?php

namespace Modules\BusinessRegistration\Entities;

use App\Models\File;
use App\Models\Settings\FiscalYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class IndustryRenew extends Model
{
    use HasFactory,SoftDeletes,EventObserveTrait;

   protected $dates = [
       'created_at',
       'updated_at',
       'deleted_at'
   ];

   protected $fillable = [
       'fiscal_year_id',
       'industry_id',
       'date',
       'date_en',
       'date_to_be_maintained',
       'date_to_be_maintained_en',
       'renew_amount',
       'penalty_amount',
       'payment_receipt',
       'payment_receipt_date',
       'payment_receipt_date_en',
       'reg_no',
       'registration_no'
   ];

    public function fiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class);
    }

    public function industry(): BelongsTo
    {
        return $this->belongsTo(Industry::class);
    }
    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'model');
    }
}
