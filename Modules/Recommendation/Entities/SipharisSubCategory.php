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
    protected $casts = [
        'status' => 'boolean',
    ];

    public static function getSipharisSubCategoryByCategoryId($id){
        return self::select('id','title','sipharis_category_id')->where('sipharis_category_id',$id)->get();

    }

    public static function getActiveSubCategory(){
        return self::select('id','title','sipharis_category_id')->get();
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function categories()
    {
        return $this->belongsTo(SipharisCategory::class, 'sipharis_category_id');
    }

    public function formTypes()
    {
    return $this->hasMany(SipharishFormType::class, 'sipharis_sub_category_id');
    }
}
