<?php

namespace Modules\Recommendation\Entities;

use App\Models\MobileUser;
use App\Models\User;
use App\Traits\NepaliDateConverter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class RecommendationCreate extends Model
{
    use HasFactory;
    use SoftDeletes;
    use EventObserveTrait;
    use NepaliDateConverter;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'recommendation_detail_id',
        'signature_by',
        'approved_by',
        'approved_date',
        'approved_status',
        'created_by',
        'file',
        'mobile_user_id',
        'personal_detail_id',
        'status',
    ];

    public function signatureBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'signature_by');
    }

    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function recommendationDetail(): BelongsTo
    {
        return $this->belongsTo(RecommendationDetail::class);
    }

    public function recommendationValues(): HasMany
    {
        return $this->hasMany(RecommendationValue::class);
    }

    public function mobileUser(): BelongsTo
    {
        return $this->belongsTo(MobileUser::class);
    }

    public function personalDetail(): BelongsTo
    {
        return $this->belongsTo(PersonalDetail::class);
    }

    public function resolveTemplate(): string
    {
        $content = letterHead() . $this->recommendationDetail?->content;
        $replaceableList = collect();
        $this->load('recommendationDetail', 'recommendationValues.recommendationFormField');

        foreach ($this->recommendationValues?->load('recommendationFormField.recommendationFormFields') as $values) {
            if ($values->type == 'table') {
                $value = (string) View::make('recommendation::admin.recommendation.recommendation-create.recommendation-table', compact('values'));
            } else {
                $value = (string) $values->value_data;
            }
            $key = (string) $values->recommendationFormField?->field_name;
            $value = (string) $value;

            $replaceableList->put('{{' . $key . '}}', $value);
            $replaceableList->put('[@form.' . $key . ']', $value);
            if (!empty($values->recommendationFormField?->slug)) {
                $replaceableList->put('[@form.' . $values->recommendationFormField->slug . ']', $value);
            }
        }

        $replaceableList->put('[@province]', (string) officeSetting()->province?->province);
        $replaceableList->put('[@district]', (string) officeSetting()->district?->district);
        $replaceableList->put('[@muncipal]', (string) officeSetting()->localBody?->local_body);

        $wardNo = auth()->user()->ward_no;
        if (is_array($wardNo)) {
            $wardNo = implode(', ', $wardNo);
        }
        $replaceableList->put('[@ward_no]', (string) $wardNo);
        $replaceableList->put('[@today_date_bs]', (string) get_nepali_number($this->get_today_nepali_date()));
        $replaceableList->put('[@today_date_ad]', (string) today()->toDateString());
        // $replaceableList->put('[@checker_signature]', '<img src="' . (auth()->user()->signature_photo_path_url ?? '') . '" width="100" height="100" alt="Signature Photo">');
        $replaceableList->put('[@checker_signature]', '<img src="' . (auth()->user()->signature_photo_path_url ?? '') . '" width="100" height="100" alt="Signature Photo">');
        $replaceableList->put('[@approver_signature]', '<img src="' . (auth()->user()->signature_photo_path_url ?? '') . '" width="100" height="100" alt="Signature Photo">');


        $replaceableKeys = $replaceableList->keys()->toArray();
        $replaceableValues = $replaceableList->values()->toArray();


        return Str::replace($replaceableKeys, $replaceableValues, $content ?? '');
    }




    public function setFileAttribute($value)
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['file'] = $value->store('recommendationCreateFile/', 'public');
        }
    }

    public function getFileUrlAttribute(): string
    {
        return $this->attributes['file'] ? Storage::disk('public')->url($this->attributes['file']) : asset('images/user_icon.jpg');
    }

    public function recommendationFiles(): HasMany
    {
        return $this->hasMany(RecommendationFile::class);
    }
    public function recommendationCategories(): BelongsTo
    {
        return $this->belongsTo(RecommendationCategory::class);
    }
   
}
