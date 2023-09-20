<?php

namespace Modules\Recommendation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SipharisCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    use EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'title',
        'status',
        'created_by'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public static function getActiveSipharis(){
       return self::where('status',1)->get();
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function subCategory()
    {
        return $this->hasMany(SipharisSubCategory::class, 'sipharis_category_id');
    }
}
