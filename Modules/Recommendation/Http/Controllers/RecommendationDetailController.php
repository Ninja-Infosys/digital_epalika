<?php

namespace Modules\Recommendation\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Recommendation\Entities\RecommendationCategory;
use Modules\Recommendation\Entities\RecommendationDetail;
use Modules\Recommendation\Entities\RecommendationDocument;
use Modules\Recommendation\Entities\RecommendationFormField;
use Modules\Recommendation\Entities\RevenueHeader;
use Modules\Recommendation\Http\Requests\RecommendationDetail\StoreRecommendationDetailRequest;
use Modules\Recommendation\Http\Requests\RecommendationDetail\UpdateRecommendationDetailRequest;

class RecommendationDetailController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('recommendation_detail_access');

        $userWardNo = auth()->user()->ward_no;

        // Check if the user's ward number is null
        if (is_null($userWardNo)) {
            // Show data where 'is_displayed' is null
            $recommendationDetails = RecommendationDetail::where('is_displayed',1)->get();
        } else {
            // Show data where 'is_displayed' is 1
            $recommendationDetails = RecommendationDetail::whereNull('is_displayed')->get();
        }

        return view('recommendation::admin.recommendation.setting.recommendation-detail.index', compact('recommendationDetails'));
    }


    public function create()
    {
        $this->checkAuthorization('recommendation_detail_create');

        $recommendationCategories = RecommendationCategory::all();
        $revenueHeaders = RevenueHeader::all();
        $recommendationDocuments = RecommendationDocument::all();
        return view('recommendation::admin.recommendation.setting.recommendation-detail.create', compact('recommendationDocuments', 'recommendationCategories', 'revenueHeaders'));
    }

    public function store(StoreRecommendationDetailRequest $request)
    {
        $this->checkAuthorization('recommendation_detail_create');

        DB::transaction(function () use ($request) {
            $recommendationDetail = RecommendationDetail::create($request->validated());
            $recommendationDetail->revenueHeaders()->attach($request->validated()['revenueHeaders']);
            $recommendationDetail->recommendationDocuments()->attach($request->validated()['recommendationDocuments']);

            foreach ($request->validated()['form'] as $formData) {
                $recommendationData = $recommendationDetail->recommendationFormFields()->create($this->getFormData($formData));
                if ($formData['type'] === 'table' && isset($formData['table'])) {
                    foreach ($formData['table'] as $tableData) {
                        $recommendationData->recommendationFormFields()->create($this->getFormData($tableData));
                    }
                }
            }
        });
        toast('सिफारिस विवरण सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(RecommendationDetail $recommendationDetail)
    {
        $this->checkAuthorization('recommendation_detail_access');

        $recommendationDetail->load('recommendationFormFields' );
        return view('recommendation::admin.recommendation.setting.recommendation-detail.show', compact('recommendationDetail'));
    }

    public function edit(RecommendationDetail $recommendationDetail)
    {
        $this->checkAuthorization('recommendation_detail_edit');

        $recommendationDetail->load('revenueHeaders', 'recommendationDocuments', 'recommendationFormFields.recommendationFormFields');
        $revenueHeaders = RevenueHeader::all();
        $recommendationCategories = RecommendationCategory::all();
        $recommendationDocuments = RecommendationDocument::all();
        return view('recommendation::admin.recommendation.setting.recommendation-detail.edit', compact('recommendationDocuments', 'revenueHeaders', 'recommendationDetail', 'recommendationCategories'));
    }

    public function update(UpdateRecommendationDetailRequest $request, RecommendationDetail $recommendationDetail)
    {
        $this->checkAuthorization('recommendation_detail_edit');

        $validatedData = $request->validated();
        RecommendationFormField::whereNotIn('id', collect($validatedData['form'])->pluck('id')->toArray())
               ->where('recommendation_detail_id', $recommendationDetail->id)
               ->delete();
        DB::transaction(function () use ($validatedData, $recommendationDetail) {
            $keysToCheck = ['is_citizenship_required', 'is_applicable_org', 'is_applicant_self','is_permission_required','is_taxcode_required','add_land_diff_locations','is_applicable_on_recommendation']; // Keys to check for existence
            foreach ($keysToCheck as $key) {
                if (!array_key_exists($key, $validatedData)) {
                    $validatedData[$key] = 0;
                }
            }
            $recommendationDetail->update($validatedData);
            $recommendationDetail->revenueHeaders()->sync($validatedData['revenueHeaders']);
            $recommendationDetail->recommendationDocuments()->sync($validatedData['recommendationDocuments']);

            foreach ($validatedData['form'] as $formData) {
                if(array_key_exists('id', $formData) && !empty($formData['id'])) {
                    $recommendationFormFieldId = RecommendationFormField::find($formData['id']);
                    $recommendationFormFieldId->update($formData);
                    // Check if 'table' key exists before accessing it
                    if(array_key_exists('table', $formData) && $formData['type'] === 'table') {
                        RecommendationFormField::whereNotIn('id', collect($formData['table'])->pluck('id')->toArray())
                            ->where('recommendation_form_field_id', $recommendationFormFieldId->id)
                            ->delete();
                        foreach ($formData['table'] as $tableData) {
                            if(array_key_exists('id', $tableData) && !empty($tableData['id'])) {
                                $tableId = RecommendationFormField::find($tableData['id']);
                                $tableId?->update($tableData);
                            } else {
                                $recommendationFormFieldId->recommendationFormFields()->create($this->getFormData($tableData));
                            }
                        }
                    }
                } else {
                    $recommendationData = $recommendationDetail->recommendationFormFields()->create($this->getFormData($formData));
                    // Check if 'table' key exists before accessing it
                    if(array_key_exists('table', $formData) && $formData['type'] === 'table') {
                        foreach ($formData['table'] as $tableData) {
                            $recommendationData->recommendationFormFields()->create($this->getFormData($tableData));
                        }
                    }
                }
            }

        });
        toast('सिफारिस विवरण सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.recommendation.setting.recommendationDetail.index'));
    }

    public function destroy(RecommendationDetail $recommendationDetail)
    {
        $this->checkAuthorization('recommendation_detail_delete');

        $recommendationDetail->delete();
        toast('सिफारिस विवरण सफलतापूर्वक मेटियो', 'success');
        return back();
    }

    public function updateStatus(RecommendationDetail $recommendationDetail)
    {
        $recommendationDetail->update([
            'status' => !$recommendationDetail->status
        ]);

        toast('सिफारिस विवरण स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return back();
    }

    /**
     * @param mixed $formData
     * @return array
     */
    public function getFormData(mixed $formData): array
    {
        return [
            'created_by' => auth()->id(),
            'field_name' => $formData['field_name'],
            'slug' => $formData['slug'],
            'type' => $formData['type'],
        ];
    }

    public function updateTemplate(Request $request, RecommendationDetail $recommendationDetail)
    {
        $request->validate([
            'content' => ['required']
        ]);

        $recommendationDetail->update([
            'content' => $request->input('content')
        ]);
        toast('टेम्प्लेट स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }


}
