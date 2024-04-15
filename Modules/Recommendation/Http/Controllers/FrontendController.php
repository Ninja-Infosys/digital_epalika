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
use Modules\Recommendation\Http\Controllers\Admin\RecommendationController;
use Modules\Recommendation\Http\Requests\RecommendationCreate\StoreRecommendationCreateRequest;

class FrontendController extends Controller
{
    public function recommendation()
    {
        $recommendationCreates =RecommendationCreate::with('recommendationDetail')->latest('updated_at')->paginate(5);
        $recommendationCount= RecommendationCreate::count();
        $recommendationCountPending= RecommendationCreate::where('approved_status','pending')->count();
        $recommendationCountAccept= RecommendationCreate::where('approved_status','approved')->count();
        $recommendationCountReject= RecommendationCreate::where('approved_status','reject')->count();
        return view('recommendation::frontend.index',compact('recommendationCount','recommendationCreates','recommendationCountPending','recommendationCountAccept','recommendationCountReject'));
    }

    public function sipharishRegister()
    {
        return view('recommendation::frontend.sipharishRegister.register');
    }

    public function sipharishRegisterStore(StoreRecommendationCreateRequest $request)
    {
        $recommendationCreate = DB::transaction(function () use ($request) {
            $recommendationCreate = RecommendationCreate::create($request->validated() + [
                'personal_detail_id' => auth()->user()->id,
                'created_by' => auth()->id()
            ]);
    
          
            if (array_key_exists('fields', $request->validated()) && !empty($request->validated()['fields'])) {
                foreach ($request->validated()['fields'] as $field) {
                    if (!empty($field['type']) && $field['type'] == 'image') {
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
        // $recommendationCreates =RecommendationCreate::where('user_id', Auth::user()->id)->latest()->paginate(10);
        $recommendationCreates =RecommendationCreate::with('recommendationDetail', 'mobileUser', 'personalDetail')->latest()->paginate(10);
        return view('recommendation::frontend.sipharishList',compact('recommendationCreates'));
    }
    
    public function show($id)
    {
        return view('recommendation::show');
    }

    public function edit($id)
    {
        return view('recommendation::edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }


}
