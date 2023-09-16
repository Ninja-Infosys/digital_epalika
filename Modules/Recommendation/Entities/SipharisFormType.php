<?php

namespace Modules\Recommendation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Modules\Recommendation\Entities\SipharisFormFields;


class SipharisFormType extends Model
{
    use HasFactory;
    use SoftDeletes;
    use EventObserveTrait;
    public $table = 'sipharish_form_type';

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

    public static function getSipharisFormTypes(){
       //return self::where('status','active')->get();
       return self::select('sipharish_form_type.title','sipharish_form_type.id','sipharish_form_type.status','sipharish_form_type.need_approval','sipharis_sub_category.title as sipharis_sub_category')
                    ->leftJoin('sipharis_sub_category','sipharis_sub_category.sipharis_category_id','sipharish_form_type.sipharis_sub_category_id')
                    ->get();
    }

    public function formFields()
    {
        return $this->hasMany(SipharisFormFields::class, 'sipharish_form_type_id');
    }

    public static function getAllActiveFormType(){
        return self::where('status','active')->get();
    }

    public static function getAllFormTypeBySubCategory($subCategoryId){
        return self::where(['sipharis_sub_category_id'=>$subCategoryId,'status'=>'active'])->get();
    }

   
}
