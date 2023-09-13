<?php

namespace Modules\Recommendation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SipharisSubCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    use EventObserveTrait;
    public $table = 'sipharis_sub_category';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'title',
        'sipharis_category_id',
        'status',
        'created_by'
    ];
}
