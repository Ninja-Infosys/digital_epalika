<?php

namespace Modules\Revenue\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;

class InvoiceParticular extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'invoice_id',
        'revenue_category_id',
        'revenue_id',
        'revenue',
        'quantity',
        'rate',
        'fine',
        'remarks',
    ];

    protected $casts = [
        'quantity' => 'float',
        'rate' => 'float',
        'fine' => 'float',
    ];

    protected $appends = [
        'grand_total_amount',
        'amount_without_fine'
    ];

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    public function getGrandTotalAmountAttribute()
    {
        return ($this->quantity * $this->rate) + $this->fine;
    }

    public function getAmountWithoutFineAttribute(): float|int
    {
        return ($this->fine * $this->quantity);
    }
}
