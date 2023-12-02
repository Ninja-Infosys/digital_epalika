<?php

namespace Modules\Recommendation\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

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
        'sipharis_signature_id',
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


    public function signaturedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'signatured_by');
    }


    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function SipharishCreatedValues(): HasMany
    {
        return $this->hasMany(SipharishCreatedValue::class);
    }

    public function personalDetail(): BelongsTo
    {
        return $this->belongsTo(PersonalDetail::class);
    }

    public function SipharishFormType(): BelongsTo
    {
        return $this->belongsTo(SipharishFormType::class, 'sipharis_form_type_id');
    }

    public function SipharisCreatedDocuments(): HasMany
    {
        return $this->hasMany(SipharisCreatedDocument::class);
    }

    public function resolveTemplate(): string
    {
        $content = letterHead() . $this->SipharishFormType?->content;
        $replaceableList = collect();
        $this->load('SipharishFormType', 'SipharishCreatedValues.SipharisFormFields');
        foreach ($this->SipharishCreatedValues?->load('SipharisFormFields') as $values) {
            $replaceableList->put('{{' . $values->SipharisFormFields?->field_name . '}}', $values->value);
            $replaceableList->put('{{' . $values->SipharisFormFields?->slug . '}}', $values->value);
        }
        return Str::replace($replaceableList->keys(), $replaceableList->values(), $content ?? '');
    }

    public function signature()
    {
        return $this->belongsTo(SipharisSignatureDetail::class, 'sipharis_signature_id');
    }
}
