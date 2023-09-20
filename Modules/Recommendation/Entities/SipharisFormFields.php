<?php

namespace Modules\Recommendation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Modules\Recommendation\Entities\SipharisFormType;

class SipharisFormFields extends Model
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
        'sipharish_form_type_id',
        'field_name',
        'status',
        'created_by'
    ];

    public static function getFormFieldByFormType($id){
        return self::select('sipharis_form_fields.id','sipharis_form_fields.field_name','sipharis_form_fields.status')->where('sipharish_form_type_id',$id)->get();
    }

    public function formType()
    {
        return $this -> belongsTo(SipharisFormType::class, 'sipharish_form_type_id');
    }
}
