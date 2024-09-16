<?php

namespace Modules\Recommendation\Entities;

use App\Models\MobileUser;
use App\Models\Settings\LetterHead;
use App\Models\User;
use App\Traits\EventObserveTrait;
use App\Traits\NepaliDateConverter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Modules\Recommendation\Enums\RecommendationStatusEnum;

class RecommendationCreate extends Model
{
    use EventObserveTrait;
    use HasFactory;
    use NepaliDateConverter;
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
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

    protected $casts = [
        'approved_status' => RecommendationStatusEnum::class,
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
        return $this->belongsTo(MobileUser::class, 'mobile_user_id');
    }

    public function personalDetail(): BelongsTo
    {
        return $this->belongsTo(PersonalDetail::class);
    }

    public function resolveTemplate($recommendationSetting): string
    {
        // $content = letterHead().$this->recommendationDetail?->content;
        $content = $this->recommendationDetail?->content;
        $replaceableList = collect();
        $this->load('recommendationDetail', 'recommendationValues.recommendationFormField');

        foreach ($this->recommendationValues?->load('recommendationFormField.recommendationFormFields') as $values) {

            if ($values->type == 'table') {
                $value = (string) View::make('recommendation::admin.recommendation.recommendation-create.recommendation-table', compact('values'));
            } else {
                $value = (string) $values->value;
            }
            $key = (string) $values->recommendationFormField?->field_name;

            $replaceableList->put('{{' . $key . '}}', $value);
            $replaceableList->put('[@form.' . $key . ']', $value);
            if (! empty($values->recommendationFormField?->slug)) {
                $replaceableList->put('[@form.' . $values->recommendationFormField->slug . ']', $value);
            }
        }

        $replaceableList->put('[@province]', (string) officeSetting()->province?->province);
        $replaceableList->put('[@district]', (string) officeSetting()->district?->district);
        $replaceableList->put('[@muncipal]', (string) officeSetting()->localBody?->local_body);
        $replaceableList->put('[@letterHead]', $this->getRecommendationHeader());

        $replaceableList->put('[@ward_no]', (string) officeSetting()->ward_no);
        $replaceableList->put('[@today_date_bs]', (string) get_nepali_number($this->get_today_nepali_date()));
        $replaceableList->put('[@today_date_ad]', (string) today()->toDateString());
        $replaceableList->put(
            '[@checker_signature]',
            ($this->approved_status->value > 2 && $this->approved_status->value < 5) ? "<img src='{$recommendationSetting?->checker?->signature_photo_url}' width='100' height='100' alt='Signature Photo'>" : ''
        );
        $replaceableList->put(
            '[@approver_signature]',
            ($this->approved_status->value > 3 && $this->approved_status->value < 5) ? "<img src='{$recommendationSetting?->approver?->signature_photo_url}' width='100' height='100' alt='Signature Photo'>" : ''
        );
        $replaceableKeys = $replaceableList->keys()->toArray();
        $replaceableValues = $replaceableList->values()->toArray();

        return Str::replace($replaceableKeys, $replaceableValues, $content);
    }

    public function setFileAttribute($value): void
    {
        if (! empty($value) && ! is_string($value)) {
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



    public function getRecommendationHeader(): string
    {
        $this->load('recommendationDetail', 'mobileUser');
        $isWard = $this->recommendationDetail->is_displayed == null;

        if ($isWard) {
            $user = User::where('ward_no', $this->mobileUser?->ward_no)->first();
            $letterHead = $user->letterHead?->header
                ?? ($user->role->letterHead?->header ?? null)
                ?? LetterHead::first()?->header;
        } else {
            $user = User::whereNull('ward_no')->first();
            $letterHead = $user->letterHead?->header
                ?? ($user->role->letterHead->header ?? null)
                ?? LetterHead::first()?->header;
        }

        return $letterHead;
    }
}
