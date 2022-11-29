<?php

namespace Modules\Recommendation\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OfficeHeader;
use App\Models\Settings\OfficeSetting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Modules\Recommendation\Enums\ApplicationTypeEnum;
use Illuminate\Support\Facades\Gate;
use Modules\Recommendation\Entities\FormBuilder;
use Modules\Recommendation\Entities\Recommendation;
use Modules\Recommendation\Http\Requests\StoreRecommendationRequest;
use Modules\Recommendation\Http\Requests\UpdateRecommendationRequest;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class RecommendationController extends Controller
{
    public function getApplicationList(): Factory|View|Application
    {
        $this->checkAuthorization('recommendation_access');

        return view('recommendation::admin.application_list');
    }

    public function index(ApplicationTypeEnum $applicationTypeEnum)
    {
        $this->checkAuthorization('recommendation_access');

        $recommendations = Recommendation::with('fiscalYear')
            ->where('application_type', $applicationTypeEnum->value)
            ->latest('date_ne')
            ->paginate(1);

        return view('recommendation::admin.recommendation.index', compact('applicationTypeEnum', 'recommendations'));
    }

    public function create(ApplicationTypeEnum $applicationTypeEnum)
    {
        $this->checkAuthorization('recommendation_create');



        $definition = $this->getDefinition($applicationTypeEnum);

        if (empty($definition)) {
            return $this->redirectIfEmptyDefination($applicationTypeEnum);
        }

        $data = '{}';

        return view('recommendation::admin.recommendation.create', compact('applicationTypeEnum', 'definition', 'data'));
    }

    public function store(StoreRecommendationRequest $request, ApplicationTypeEnum $applicationTypeEnum)
    {

        $this->checkAuthorization('recommendation_create');



        $builder = $this->getDefinition($applicationTypeEnum);

        if (empty($builder)) {
            return $this->redirectIfEmptyDefination($applicationTypeEnum);
        }

        $data = $request->validateDynamicForm(
            $builder?->form,
            $request->get('submissionValues'),
            null
        );

        Recommendation::create([
            'application_type' => $applicationTypeEnum->value,
            'data' => $data,
            'fiscal_year_id' => OfficeSetting::latest()->first()?->fiscal_year_id ?? null,
            'date_ne' => $request->input('date_ne'),
            'date_en' => $request->input('date_en'),
            'name' => $request->input('name'),
        ]);

        toast('फारम सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function show(ApplicationTypeEnum $applicationTypeEnum, Recommendation $recommendation)
    {
        $this->checkAuthorization('recommendation_access');

        $definition = $this->getDefinition($applicationTypeEnum);

        if (empty($definition)) {
            return $this->redirectIfEmptyDefination($applicationTypeEnum);
        }

        return view('recommendation::admin.recommendation.show', compact('applicationTypeEnum', 'recommendation', 'definition'));
    }

    public function edit(ApplicationTypeEnum $applicationTypeEnum, Recommendation $recommendation)
    {
        $this->checkAuthorization('recommendation_edit');

        $definition = $this->getDefinition($applicationTypeEnum);

        if (empty($definition)) {
            return $this->redirectIfEmptyDefination($applicationTypeEnum);
        }

        return view('recommendation::admin.recommendation.edit', compact('applicationTypeEnum', 'recommendation', 'definition'));
    }

    public function update(UpdateRecommendationRequest $request, ApplicationTypeEnum $applicationTypeEnum, Recommendation $recommendation)
    {
        $this->checkAuthorization('recommendation_edit');

        $builder = $this->getDefinition($applicationTypeEnum);

        if (empty($builder)) {
            return $this->redirectIfEmptyDefination($applicationTypeEnum);
        }

        $data = $request->validateDynamicForm(
            $builder?->form,
            $request->get('submissionValues'),
            null
        );

        $recommendation->update([
            'application_type' => $applicationTypeEnum->value,
            'data' => $data,
            'fiscal_year_id' => OfficeSetting::latest()->first()?->fiscal_year_id ?? null,
            'date_ne' => $request->input('date_ne'),
            'date_en' => $request->input('date_en'),
            'name' => $request->input('name'),
        ]);



        toast('फारम सफलतापूर्वक सम्पादन भयो', 'success');

        return back();
    }

    public function destroy(ApplicationTypeEnum $applicationTypeEnum, Recommendation $recommendation)
    {
        $this->checkAuthorization('recommendation_delete');

        $recommendation->delete();

        toast('फारम सफलतापूर्वक हटाइयो', 'success');

        return back();
    }

    public function getDefinition(ApplicationTypeEnum $applicationTypeEnum): null|FormBuilder
    {
        return FormBuilder::where('application_type', $applicationTypeEnum->value)->latest()->first();
    }

    /**
     * @param ApplicationTypeEnum $applicationTypeEnum
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectIfEmptyDefination(ApplicationTypeEnum $applicationTypeEnum): \Illuminate\Http\RedirectResponse
    {
        toast('फारम बनेको छैन', 'error');
        return redirect()->route('admin.recommendation.setting.formBuilder.create', $applicationTypeEnum);
    }
}
