<?php

namespace Modules\Recommendation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;


class SipharishFormType extends Model
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
        'sipharis_sub_category_id',
        'title',
        'content',
        'need_approval',
        'status',
        'created_by'
    ];
    protected $casts = [
        'status' => 'boolean',
    ];

   

    public function formFields()
    {
        return $this->hasMany(SipharisFormFields::class, 'sipharish_form_type_id');
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function subCategories()
    {
        return $this->belongsTo(SipharisSubCategory::class, 'sipharis_sub_category_id');
    }
    public static function getAllFormTypeBySubCategory($subCategoryId){
        return self::where(['sipharis_sub_category_id'=>$subCategoryId,'status'=>true])->get();
    }

    

   
}
