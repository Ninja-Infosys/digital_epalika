<?php

namespace Modules\Recommendation\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Modules\Recommendation\Entities\RecommendationCreate;
use Modules\Recommendation\Entities\RecommendationFile;
use Modules\Recommendation\Entities\RecommendationSetting;
use Modules\Recommendation\Entities\SipharisSetting;
use Modules\Recommendation\Enums\RecommendationStatusEnum;
use Modules\Recommendation\Http\Requests\RecommendationCreate\StoreRecommendationCreateRequest;
use Modules\Recommendation\Http\Requests\RecommendationCreate\UpdateRecommendationCreateRequest;
use Modules\Recommendation\Http\Requests\UpdateRecommendationRequest;

class RecommendationCreateController extends Controller
{
    public function index()
    {
        $recommendationCreates = RecommendationCreate::with('recommendationDetail', 'mobileUser')->latest()->get();

        return view('recommendation::admin.recommendation.recommendation-create.index', compact('recommendationCreates'));
    }

    public function create()
    {
        return view('recommendation::admin.recommendation.recommendation-create.create');
    }

    public function store(StoreRecommendationCreateRequest $request)
    {
        
        $recommendationCreate = DB::transaction(function () use ($request) {

            $recommendationCreate = RecommendationCreate::create($request->validated() + [
                    'created_by' => auth()->id(),
                ]);

            if (
                array_key_exists('fields', $request->validated())
                && !empty($request->validated()['fields'])
            ) {

                foreach ($request->validated()['fields'] as $field) {

                    if (!empty($field['type']) && $field['type'] == 'image') {
                        $value = Storage::disk('public')
                            ->putFile('recommendation/files', $field['value']);
                    } else {
                        $value = $field['value'];
                    }

                    $recommendationCreate->recommendationValues()->create([
                        'recommendation_form_field_id' => $field['recommendation_form_field_id'],
                        'value' => $value,
                        'type' => $field['type'],
                    ]);
                }
            }
            if (
                array_key_exists('files', $request->validated())
                && !empty($request->validated()['files'])
            ) {
                foreach ($request->validated('files') ?? [] as $file) {
                    $recommendationCreate->recommendationFiles()->create($file);
                }
            }

            return $recommendationCreate;
        });

        toast('सिफारिस सफलतापूर्वक थपियो', 'success');

        return redirect(route('admin.recommendation.recommendationCreate.show', $recommendationCreate->id));
    }

    public function edit(RecommendationCreate $recommendationCreate)
    {
        $recommendationCreate->load('recommendationValues.recommendationFormField');

        return view('recommendation::admin.recommendation.recommendation-create.edit', compact('recommendationCreate'));
    }

    public function update(UpdateRecommendationCreateRequest $request, RecommendationCreate $recommendationCreate)
{
    
        $recommendationCreate = DB::transaction(function () use ($request, $recommendationCreate) {
            $recommendationCreate->update($request->validated() + [
                'created_by' => auth()->id(),
            ]);

            if (array_key_exists('fields', $request->validated()) && !empty($request->validated()['fields'])) {
                foreach ($request->validated()['fields'] as $field) {
                    $value = $field['value'];

                    if (!empty($field['type']) && $field['type'] == 'image') {
                        $value = Storage::disk('public')->putFile('recommendation/files', $field['value']);
                    }

                    $recommendationValue = $recommendationCreate->recommendationValues()
                        ->where('recommendation_form_field_id', $field['recommendation_form_field_id'])
                        ->first();

                    if ($recommendationValue) {
                        $recommendationValue->update([
                            'value' => $value,
                            'type' => $field['type'],
                        ]);
                    } else {
                        $recommendationCreate->recommendationValues()->create([
                            'recommendation_form_field_id' => $field['recommendation_form_field_id'],
                            'value' => $value,
                            'type' => $field['type'],
                        ]);
                    }
                }
            }

            if (array_key_exists('files', $request->validated()) && !empty($request->validated()['files'])) {
                $recommendationCreate->recommendationFiles()->delete();
                foreach ($request->validated('files') ?? [] as $file) {
                    $recommendationCreate->recommendationFiles()->create($file);
                }
            }

            return $recommendationCreate;
        });

        toast('सिफारिस सफलतापूर्वक अपडेट गरियो', 'success');
        return redirect(route('admin.recommendation.recommendationCreate.show', $recommendationCreate));
    } 

    
    
    public function show(RecommendationCreate $recommendationCreate)
    {
        $recommendationCreate->load(
            'recommendationValues.recommendationFormField',
            'recommendationFiles.recommendationDocument',
            'recommendationDetail.revenueHeaders',
            'mobileUser.mobileUserDetail.province',
            'mobileUser.mobileUserDetail.district',
        );
        $recommendationSetting = RecommendationSetting::with('approver', 'checker')->where('ward', auth()->user()?->ward_no ?? null)->first();

        // dd($recommendationCreate);
        return view('recommendation::admin.recommendation.recommendation-create.view', compact('recommendationCreate', 'recommendationSetting'));
    }

    public function updateStatus(RecommendationCreate $recommendationCreate, RecommendationStatusEnum $recommendationStatusEnum)
    {
        $recommendationCreate->update([
            'approved_status' => $recommendationStatusEnum->value,
        ]);
        toast('टेम्प्लेट स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return back();
    }

    public function fileUpload(Request $request, RecommendationCreate $recommendationCreate)
    {
        $data = $request->validate([
            'file' => ['required', 'file'],
        ]);
        $recommendationCreate->update($data);
        toast('फाइल सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return back();
    }

    public function destroy(RecommendationCreate $recommendationCreate)
    {

        if ($recommendationCreate->status == 1) {
            toast('सक्रिय भएको सिफारिस प्रकार मेटाउन मनाहि छ', 'error');

            return back();
        }
        $recommendationCreate->delete();
        toast('सिफारिस सफलतापूर्वक मेटियो', 'success');

        return back();
    }

    
    public function approvedStatus(RecommendationCreate $recommendationCreate)
    {
        $recommendationCreate->update([
            'approved_status' => 'approved',
        ]);
        toast('तपाइको सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return back();
    }
}

