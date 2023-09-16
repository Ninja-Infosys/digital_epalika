<?php

namespace Modules\Recommendation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SignatureDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    use EventObserveTrait;
    public $table = 'sipharis_signature_detail';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'full_name',
        'position',
        'signature',
        'status',
        'created_by'
    ];
}
