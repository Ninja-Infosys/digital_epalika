<?php

namespace App\Models\Settings\Units;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class MeasurementUnit extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'type_id',
        'title',
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
