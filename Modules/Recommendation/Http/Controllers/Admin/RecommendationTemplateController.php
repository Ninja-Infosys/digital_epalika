<?php

namespace Modules\Recommendation\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Modules\Recommendation\Entities\FormBuilder;
use Modules\Recommendation\Entities\RecommendationTemplate;
use Modules\Recommendation\Enums\ApplicationTypeEnum;
use Modules\Recommendation\Http\Requests\Template\StoreRecommendationTemplateRequest;
use Modules\Recommendation\Http\Requests\Template\UpdateRecommendationTemplateRequest;

class RecommendationTemplateController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('recommendationTemplate_access');

        $recommendationTemplates = RecommendationTemplate::latest()->get();

        return view('recommendation::admin.setting.recommendationTemplate.index', compact('recommendationTemplates'));
    }

    public function create()
    {
        $this->checkAuthorization('recommendationTemplate_create');
        return view('recommendation::admin.setting.recommendationTemplate.create');
    }

    public function store(StoreRecommendationTemplateRequest $request)
    {
        $this->checkAuthorization('recommendationTemplate_create');

        RecommendationTemplate::create($request->validated() + [
                'user_id'=>auth()->id(),
                'is_active' => RecommendationTemplate::where('is_active', 1)->count() === 0 ? '1' : '0'
            ]);
        toast('टेम्प्लेट सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(RecommendationTemplate $recommendationTemplate)
    {
        return view('recommendation::show', compact('recommendationTemplate'));
    }

    public function edit(RecommendationTemplate $recommendationTemplate)
    {
        $this->checkAuthorization('recommendationTemplate_edit');

    
        return view('recommendation::admin.setting.recommendationTemplate.edit', compact('recommendationTemplate'));
    }

    public function update(UpdateRecommendationTemplateRequest $request, RecommendationTemplate $recommendationTemplate)
    {
        $this->checkAuthorization('recommendationTemplate_edit');

        $recommendationTemplate->update($request->validated());
        toast('टेम्प्लेट सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return back();
    }

    public function destroy( RecommendationTemplate $recommendationTemplate)
    {
        $this->checkAuthorization('recommendationTemplate_delete');
        if ($recommendationTemplate->is_active == 1) {
            toast('Error while deleting file', 'error');

            return back();
        }

        $recommendationTemplate->delete();
        toast('टेम्प्लेट सफलतापूर्वक मेटियो', 'success');
        return back();
    }

    public function updateStatus( RecommendationTemplate $recommendationTemplate)
    {
        $this->checkAuthorization('recommendationTemplate_access');
        DB::transaction(function () use ($recommendationTemplate) {
            $recommendationTemplate->update([
                'is_active' => 1
            ]);
            RecommendationTemplate::whereNot('id', $recommendationTemplate->id)
                ->where('is_active', 1)
                ->update([
                    'is_active' => 0
                ]);
        });

        toast('टेम्प्लेट स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return back();
    }


}
