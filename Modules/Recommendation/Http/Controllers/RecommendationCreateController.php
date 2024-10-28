<?php

namespace Modules\Recommendation\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
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
    // public function index()
    // {
    //     $user = auth()->user();
    //     $recommendation = RecommendationCreate::with('recommendationDetail', 'mobileUser')
    //     ->whereHas('recommendationDetail', function ($q) use($user){
    //         if($user->ward_no != NULL){
    //             $q->where('is_displayed', 0);

    //         }else{
    //             $q->where('is_displayed', 1);

    //         }
    //     });
    //     if ($user->ward_no != NULL) {
    //         $recommendation->whereHas('mobileUser.mobileUserDetail', function (Builder $q) use ($user) {
    //             if (!empty($user->ward_no)) {
    //                 $q->where('ward_no', $user->ward_no);
    //             }
    //         });
    //     }
    //     $recommendationCreates = $recommendation->paginate(10);

    //     return view('recommendation::admin.recommendation.recommendation-create.index', compact('recommendationCreates'));
    // }

    public function index()
    {
        $this->checkAuthorization('recommendation_access');

        $user = auth()->user();

        $recommendation = RecommendationCreate::with('recommendationDetail', 'mobileUser')
            ->whereHas('recommendationDetail', function ($q) use ($user) {

                if ($user->ward_no != NULL) {
                    $q->where(function ($subQuery) use ($user) {
                        $subQuery->where('is_displayed', 0)
                            ->orWhereNull('is_displayed');
                    });
                } else {
                    // For users without a ward_no, show all recommendations with 'is_displayed' as 1
                    $q->where('is_displayed', 1);
                }
            });

        // Additional condition based on the user's ward_no and mobileUser details
        if ($user->ward_no != NULL) {
            $recommendation->whereHas('mobileUser', function (Builder $q) use ($user) {
                $q->where(function ($subQuery) use ($user) {
                    // Show data where the ward number matches or where ward_no is null based on user's ward and is_displayed
                    if (!empty($user->ward_no)) {
                        $subQuery->where('ward_no', $user->ward_no)
                            ->orWhere(function ($nestedQuery) use ($user) {
                                // User from ward 1 seeing recommendations with 'is_displayed' as 1 and where 'ward_no' is null
                                if ($user->ward_no == 1) {
                                    $nestedQuery->whereNull('ward_no');
                                }
                            });
                    }
                });
            });
        }

        $recommendationCreates = $recommendation->latest()->paginate(10);


        return view('recommendation::admin.recommendation.recommendation-create.index', compact('recommendationCreates'));
    }




    public function create()
    {
        $this->checkAuthorization('recommendation_create');

        return view('recommendation::admin.recommendation.recommendation-create.create');
    }

    public function store(StoreRecommendationCreateRequest $request)
    {
        $this->checkAuthorization('recommendation_create');

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
        $this->checkAuthorization('recommendation_edit');

        $recommendationCreate->load('recommendationValues.recommendationFormField');

        return view('recommendation::admin.recommendation.recommendation-create.edit', compact('recommendationCreate'));
    }

    public function update(UpdateRecommendationCreateRequest $request, RecommendationCreate $recommendationCreate)
    {
        $this->checkAuthorization('recommendation_edit');


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
        $this->checkAuthorization('recommendation_access');

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
        $this->checkAuthorization('recommendation_edit');

        $recommendationCreate->update([
            'approved_status' => $recommendationStatusEnum->value,
        ]);
        toast('टेम्प्लेट स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return back();
    }

    public function fileUpload(Request $request, RecommendationCreate $recommendationCreate)
    {
        $this->checkAuthorization('recommendation_create');

        $data = $request->validate([
            'file' => ['required', 'file'],
        ]);
        $recommendationCreate->update($data);
        toast('फाइल सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return back();
    }

    public function destroy(RecommendationCreate $recommendationCreate)
    {
        $this->checkAuthorization('recommendation_delete');


        if ($recommendationCreate->approved_status !== 1) {
            toast('सक्रिय भएको सिफारिस प्रकार मेटाउन मनाहि छ', 'error');

            return back();
        }
        $recommendationCreate->delete();
        toast('सिफारिस सफलतापूर्वक मेटियो', 'success');

        return back();
    }


    public function approvedStatus(RecommendationCreate $recommendationCreate)
    {
        $this->checkAuthorization('recommendation_edit');

        $recommendationCreate->update([
            'approved_status' => 'approved',
        ]);
        toast('तपाइको सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return back();
    }
}
