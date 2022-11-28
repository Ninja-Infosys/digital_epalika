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
        abort_if(
            Gate::denies('recommendationTemplate_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $recommendationTemplates = RecommendationTemplate::latest()->get();

        return view('recommendation::admin.setting.recommendationTemplate.index', compact('recommendationTemplates'));
    }

    public function create(ApplicationTypeEnum $applicationTypeEnum)
    {
        abort_if(
            Gate::denies('recommendationTemplate_create'),
            403,
            'You not allowed to access this resource'
        );

        return view('recommendation::admin.setting.recommendationTemplate.create');
    }

    public function store(StoreRecommendationTemplateRequest $request ,ApplicationTypeEnum $applicationTypeEnum)
    {
        abort_if(
            Gate::denies('recommendationTemplate_create'),
            403,
            'You not allowed to access this resource'
        );

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
        abort_if(
            Gate::denies('recommendationTemplate_edit'),
            403,
            'You not allowed to access this resource'
        );

        return view('recommendation::admin.setting.recommendationTemplate.edit', compact('recommendationTemplate'));
    }

    public function update(UpdateRecommendationTemplateRequest $request, ApplicationTypeEnum $applicationTypeEnum,RecommendationTemplate $recommendationTemplate)
    {
        abort_if(
            Gate::denies('recommendationTemplate_edit'),
            403,
            'You not allowed to access this resource'
        );

        $recommendationTemplate->update($request->validated());
        toast('टेम्प्लेट सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.recommendation.setting.recommendationTemplate.index'));
    }

    public function destroy(ApplicationTypeEnum $applicationTypeEnum,RecommendationTemplate $recommendationTemplate)
    {
        //
    }
}
