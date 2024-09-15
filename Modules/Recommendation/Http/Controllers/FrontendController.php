<?php

namespace Modules\Recommendation\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MobileUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Modules\Recommendation\Entities\RecommendationCreate;
use Modules\Recommendation\Entities\RecommendationDetail;
use Modules\Recommendation\Entities\RecommendationFile;
use Modules\Recommendation\Entities\RecommendationSetting;
use Modules\Recommendation\Entities\SipharisSetting;
use Modules\Recommendation\Http\Controllers\Admin\RecommendationController;
use Modules\Recommendation\Http\Requests\RecommendationCreate\StoreRecommendationCreateRequest;
use Modules\Recommendation\Http\Requests\RecommendationCreate\UpdateRecommendationCreateRequest;

class FrontendController extends Controller
{
    public function recommendation()
    {
        $mobileUser = Auth::guard('mobile-user')->user()->load('mobileUserDetail');
        $recommendationCreates = RecommendationCreate::where('mobile_user_id', $mobileUser->id)
            ->with('recommendationDetail', 'recommendationValues', 'mobileUser')->latest('updated_at')->paginate(5);

        // $recommendationCreates = RecommendationCreate::with('recommendationDetail')->latest('updated_at')->paginate(5);
        $recommendationCount = $mobileUser->recommendationCreates()->count();
        $recommendationCountPending = $mobileUser->recommendationCreates()->where('approved_status', '1')->count();
        $recommendationCountAccept = $mobileUser->recommendationCreates()->where('approved_status', '4')->count();
        $recommendationCountReject = $mobileUser->recommendationCreates()->where('approved_status', '5')->count();
        return view('recommendation::frontend.index', compact('recommendationCount', 'recommendationCreates', 'recommendationCountPending', 'recommendationCountAccept', 'recommendationCountReject'));

    }

    public function sipharishRegister()
    {
        // $mobileUser = Auth::guard('mobile-user')->user()->id;
        // return ($mobileUser);
        return view('recommendation::frontend.sipharishRegister.register');
    }

    public function sipharishRegisterStore(StoreRecommendationCreateRequest $request)
    {

        $recommendationCreate = DB::transaction(function () use ($request) {
            // Get the authenticated user
            $user = Auth::guard('mobile-user')->user();

            // Create a new recommendation with validated data
            $recommendationCreate = RecommendationCreate::create(array_merge(
                $request->validated(),
                [
                    'mobile_user_id' => $user->id,
                    'created_by' => $user->id
                ]
            ));


            if (
                array_key_exists('fields', $request->validated())
                && !empty ($request->validated()['fields'])
            ) {

                foreach ($request->validated()['fields'] as $field) {

                    if (!empty ($field['type']) && $field['type'] == 'image') {
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

        toast('सिफारिस सफलतापूर्वक दर्ता भयो ', 'success');
        return back();
    }
    public function sipharishList()
    {
        $mobileUser = Auth::guard('mobile-user')->user()->load('mobileUserDetail');
        $recommendationCreates = RecommendationCreate::where('mobile_user_id', $mobileUser->id)->with('recommendationDetail', 'mobileUser', 'personalDetail')->latest()->paginate(10);
        return view('recommendation::frontend.sipharishList', compact('recommendationCreates'));
    }


    public function recommendationListshow(RecommendationCreate $recommendationCreate)
    {
        
        $mobileUser = Auth::guard('mobile-user')->user()->load('mobileUserDetail');
        $recommendationCreate->load('recommendationDetail', 'recommendationValues', 'recommendationFiles.recommendationDocument');
        $recommendationSetting = RecommendationSetting::with('approver', 'checker')->where('ward', auth()->user()?->ward_no ?? null)->first();

        return view('recommendation::frontend.sipharisView', compact('recommendationCreate', 'mobileUser', 'recommendationSetting'));
    }



    public function recommendationEdit(RecommendationCreate $recommendationCreate)
    {
        $recommendationCreate->load('recommendationValues.recommendationFormField');
        return view('recommendation::frontend.sipharishEdit',compact('recommendationCreate'));
    }

    public function recommendationUpdate(UpdateRecommendationCreateRequest $request, RecommendationCreate $recommendationCreate)
    {
        $recommendationCreate = DB::transaction(function () use ($request, $recommendationCreate) {
            // Get the authenticated user
            $user = Auth::guard('mobile-user')->user();

            // Update the recommendation with validated data
            $recommendationCreate->update(array_merge(
                $request->validated(),
                [
                    'mobile_user_id' => $user->id,
                    'created_by' => $user->id
                ]
            ));

            // Delete old files
            if (array_key_exists('deleted_files', $request->validated())) {
                $deletedFileIds = $request->validated()['deleted_files'];
                $recommendationCreate->RecommendationFile::whereIn('id', $deletedFileIds)->delete();
            }

            // Update or delete existing recommendation values
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

            // Add new files
             // Replace old files with new ones
        if (array_key_exists('files', $request->validated()) && !empty($request->validated()['files'])) {
            $recommendationCreate->recommendationFiles()->delete();
            foreach ($request->validated('files') ?? [] as $file) {
                $recommendationCreate->recommendationFiles()->create($file);
            }
        }


            return $recommendationCreate;
        });

        toast('सिफारिस सफलतापूर्वक अपडेट गरियो', 'success');
        return redirect(route('recommendationrecommendation.recommendationListshow', $recommendationCreate));
    }



    public function destroySipharish(RecommendationCreate $recommendationCreate)
    {
        if ($recommendationCreate->status == 1) {
            toast('सक्रिय भएको सिफारिस प्रकार मेटाउन मनाहि छ', 'error');
            return back();
        }
        $recommendationCreate->delete();
        toast('सिफारिस सफलतापूर्वक मेटियो', 'success');
        return back();
    }


}
