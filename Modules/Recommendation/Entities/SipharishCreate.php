<?php

namespace Modules\Recommendation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SipharishCreate extends Model
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
        'sipharis_form_type_id',
        'personal_detail_id',
        'signatured_by',
        'approved_by',
        'approved_date',
        'approved_status',
        'created_by',
        'status'
    ];
    protected $casts = [
        'status' => 'boolean',
    ];

    public function formValues()
    {
        return $this->hasMany(SipharishCreatedValue::class, 'sipharish_create_id');
    }

     public function formTypes()
    {
        return $this->belongsTo(SipharishFormType::class, 'sipharis_form_type_id');
    }

    public function sipharisDocuments()
    {
        return $this->hasMany(SipharisCreatedDocument::class, 'sipharish_create_id');
    }
}
