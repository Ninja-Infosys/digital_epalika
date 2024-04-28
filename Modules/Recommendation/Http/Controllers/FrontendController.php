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
use Modules\Recommendation\Entities\SipharisSetting;
use Modules\Recommendation\Http\Controllers\Admin\RecommendationController;
use Modules\Recommendation\Http\Requests\RecommendationCreate\StoreRecommendationCreateRequest;

class FrontendController extends Controller
{
    public function recommendation()
    {
        $mobileUser = Auth::guard('mobile-user')->user()->load('mobileUserDetail');
        $recommendationCreates = RecommendationCreate::where('mobile_user_id', $mobileUser->id)
            ->with('recommendationDetail','recommendationValues', 'mobileUser')->latest('updated_at')->paginate(5);

        // $recommendationCreates = RecommendationCreate::with('recommendationDetail')->latest('updated_at')->paginate(5);
        $recommendationCount = $mobileUser->recommendationCreates()->count();
        $recommendationCountPending = $mobileUser->recommendationCreates()->where('approved_status', 'pending')->count();
        $recommendationCountAccept = $mobileUser->recommendationCreates()->where('approved_status', 'approved')->count();
        $recommendationCountReject = $mobileUser->recommendationCreates()->where('approved_status', 'reject')->count();
        return view('recommendation::frontend.index', compact('recommendationCount', 'recommendationCreates', 'recommendationCountPending', 'recommendationCountAccept', 'recommendationCountReject'));

    }

    public function sipharishRegister()
    {
        return view('recommendation::frontend.sipharishRegister.register');
    }

    public function sipharishRegisterStore(StoreRecommendationCreateRequest $request)
    {
        $recommendationCreate = DB::transaction(function () use ($request) {
            $recommendationCreate = RecommendationCreate::create($request->validated() + [
                'mobile_user_id' => Auth::guard('mobile-user')->user()->id,
                'created_by' => Auth::guard('mobile-user')->id()
            ]);
            if (array_key_exists('fields', $request->validated()) && !empty ($request->validated()['fields'])) {
                foreach ($request->validated()['fields'] as $field) {
                    if (!empty ($field['type']) && $field['type'] == 'image') {
                        // Handle image upload if required
                        $value = Storage::disk('public')->putFile('recommendation/files', $field['value']);
                    } else {
                        $value = $field['value'];
                    }

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

        $recommendationCreate->load('recommendationDetail', 'recommendationValues', 'recommendationFiles',);
        return view('recommendation::frontend.sipharisView', compact('recommendationCreate', 'mobileUser'));
    }


    public function edit($id)
    {
        return view('recommendation::edit');
    }

    public function update(Request $request, $id)
    {
        //
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
