<?php

namespace Modules\Recommendation\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MobileUser;
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
        return view('recommendation::frontend.index');
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
            
            // Process the files data
            // foreach ($request->validated('files') ?? [] as $file) {
            //     $recommendationCreate->recommendationFiles()->create($file);
            // }
    
            return $recommendationCreate;
        });
    
        toast('सिफारिस सफलतापूर्वक दर्ता भयो ', 'success');
        return back();
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
