<?php

namespace Modules\Recommendation\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Modules\Recommendation\Entities\RecommendationCreate;
use Modules\Recommendation\Entities\SipharisSetting;
use Modules\Recommendation\Enums\RecommendationStatusEnum;
use Modules\Recommendation\Http\Requests\RecommendationCreate\StoreRecommendationCreateRequest;

class RecommendationCreateController extends Controller
{
    public function index()
    {
        $recommendationCreates = RecommendationCreate::with('recommendationDetail', 'mobileUser', 'personalDetail')->latest()->get();

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
                    'created_by' => auth()->id()
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
//                    $recommendationCreate->recommendationValues()
//                        ->create([
//
//                            'recommendation_form_field_id' => $field['recommendation_form_field_id'] ?? '',
//                            'value' => $value ?? '',
//                            'type' => $field['type'] ?? '',
//                        ]);
                }
            }

            foreach ($request->validated('files') ?? [] as $file) {
                $recommendationCreate->recommendationFiles()->create($file);
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

    public function show(RecommendationCreate $recommendationCreate)
    {
        $recommendationCreate->load(
            'recommendationValues.recommendationFormField',
            'recommendationFiles.recommendationDocument',
            'recommendationDetail.revenueHeaders'
        );
        $sipharisSetting = SipharisSetting::first();

        return view('recommendation::admin.recommendation.recommendation-create.view', compact('recommendationCreate','sipharisSetting'));
    }


    public function updateStatus(RecommendationCreate $recommendationCreate, RecommendationStatusEnum $recommendationStatusEnum)
    {
        $recommendationCreate->update([
            'status' => $recommendationStatusEnum->value,
        ]);
        toast('टेम्प्लेट स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }


    public function fileUpload(Request $request, RecommendationCreate $recommendationCreate)
    {
        $data = $request->validate([
            'file' => ['required', 'file']
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
