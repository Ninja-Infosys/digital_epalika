<?php

namespace Modules\Recommendation\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Recommendation\Entities\RecommendationTemplate;
use Modules\Recommendation\Enums\ApplicationTypeEnum;
use Modules\Recommendation\Http\Requests\Template\StoreRecommendationTemplateRequest;
use Modules\Recommendation\Http\Requests\Template\UpdateRecommendationTemplateRequest;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class RecommendationTemplateController extends Controller
{
    public function index(ApplicationTypeEnum $applicationTypeEnum)
    {
        $this->checkAuthorization('recommendationTemplate_access');

        $recommendationTemplates = RecommendationTemplate::latest()->get();

        return view('recommendation::admin.setting.recommendationTemplate.index', compact('recommendationTemplates'));
    }

    public function create(ApplicationTypeEnum $applicationTypeEnum)
    {
        $this->checkAuthorization('recommendationTemplate_create');

        return view('recommendation::admin.setting.recommendationTemplate.create');
    }

    public function store(StoreRecommendationTemplateRequest $request ,ApplicationTypeEnum $applicationTypeEnum)
    {
        $this->checkAuthorization('recommendationTemplate_create');

        $recommendationTemplates = RecommendationTemplate::where('for', $request->input('for'))->first();
        if (empty($recommendationTemplates)) {
            RecommendationTemplate::create($request->validated());
            toast('टेम्प्लेट सफलतापूर्वक थपियो', 'success');
        } else {
            toast('टेम्प्लेट पहिले नै उपलब्ध छ', 'warning');
        }

        return back();
    }

    public function show(ApplicationTypeEnum $applicationTypeEnum,RecommendationTemplate $recommendationTemplate)
    {
        return view('recommendation::show');
    }

    public function edit(ApplicationTypeEnum $applicationTypeEnum,RecommendationTemplate $recommendationTemplate)
    {
        $this->checkAuthorization('recommendationTemplate_edit');

        return view('recommendation::admin.setting.recommendationTemplate.edit', compact('recommendationTemplate'));
    }

    public function update(UpdateRecommendationTemplateRequest $request, ApplicationTypeEnum $applicationTypeEnum,RecommendationTemplate $recommendationTemplate)
    {
        $this->checkAuthorization('recommendationTemplate_edit');

        $recommendationTemplate->update($request->validated());
        toast('टेम्प्लेट सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.recommendation.setting.recommendationTemplate.index'));
    }

    public function destroy(ApplicationTypeEnum $applicationTypeEnum,RecommendationTemplate $recommendationTemplate)
    {
        //
    }
}
