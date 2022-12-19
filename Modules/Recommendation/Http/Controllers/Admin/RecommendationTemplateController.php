<?php

namespace Modules\Recommendation\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Modules\Recommendation\Entities\FormBuilder;
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

        $formFields = $this->getFormFields($applicationTypeEnum);
        return view('recommendation::admin.setting.recommendationTemplate.create', compact('applicationTypeEnum', 'formFields'));
    }

    public function store(StoreRecommendationTemplateRequest $request, ApplicationTypeEnum $applicationTypeEnum)
    {

        $this->checkAuthorization('recommendationTemplate_create');

        RecommendationTemplate::create($request->validated() + [
                'application_type' => $applicationTypeEnum->value,
                'status' => RecommendationTemplate::where('application_type', $applicationTypeEnum->value)
                    ->where('status', 1)
                    ->count() === 0 ? '1' : '0'
            ]);
        toast('टेम्प्लेट सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(ApplicationTypeEnum $applicationTypeEnum, RecommendationTemplate $recommendationTemplate)
    {
        return view('recommendation::show', compact('applicationTypeEnum', 'recommendationTemplate'));
    }

    public function edit(ApplicationTypeEnum $applicationTypeEnum, RecommendationTemplate $recommendationTemplate)
    {
        $this->checkAuthorization('recommendationTemplate_edit');

        $formFields = $this->getFormFields($applicationTypeEnum);
        return view('recommendation::admin.setting.recommendationTemplate.edit', compact('recommendationTemplate', 'applicationTypeEnum', 'formFields'));
    }

    public function update(UpdateRecommendationTemplateRequest $request, ApplicationTypeEnum $applicationTypeEnum, RecommendationTemplate $recommendationTemplate)
    {
        $this->checkAuthorization('recommendationTemplate_edit');

        $recommendationTemplate->update($request->validated());
        toast('टेम्प्लेट सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return back();
    }

    public function destroy(ApplicationTypeEnum $applicationTypeEnum, RecommendationTemplate $recommendationTemplate)
    {

        $this->checkAuthorization('recommendationTemplate_delete');
        if ($recommendationTemplate->status == 1) {
            toast('Error while deleting file', 'error');

            return back();
        }

        $recommendationTemplate->delete();
        toast('टेम्प्लेट सफलतापूर्वक मेटियो', 'success');
        return back();
    }

    public function updateStatus(ApplicationTypeEnum $applicationTypeEnum, RecommendationTemplate $recommendationTemplate)
    {
        $this->checkAuthorization('recommendationTemplate_access');
        DB::transaction(function () use ($applicationTypeEnum, $recommendationTemplate) {

            $recommendationTemplate->update([
                'status' => 1
            ]);
            RecommendationTemplate::whereNot('id', $recommendationTemplate->id)->where('application_type', $applicationTypeEnum->value)->where('status', 1)->update([
                'status' => 0
            ]);
        });

        toast('टेम्प्लेट स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return back();
    }

    public function getFormFields(ApplicationTypeEnum $applicationTypeEnum): Collection
    {
        $formBuilder = FormBuilder::active()
            ->where('application_type', $applicationTypeEnum->value)
            ->first();

        $form = json_decode($formBuilder?->form)?->components;

        return collect($form)
            ->map(function ($item) {
                return [
                    'name' => $item->label,
                    'placeholder' => $item->placeholder ?? '',
                    'value' => "@[$item->key]",
                ];
            })
            ->slice(0, -1);
    }
}
