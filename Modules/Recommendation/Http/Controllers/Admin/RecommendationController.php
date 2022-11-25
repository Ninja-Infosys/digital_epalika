<?php

namespace Modules\Recommendation\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Modules\Recommendation\Enums\ApplicationTypeEnum;
use Illuminate\Support\Facades\Gate;
use Modules\Recommendation\Entities\FormBuilder;
use Modules\Recommendation\Entities\Recommendation;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class RecommendationController extends Controller
{
    public function getApplicationList(): Factory|View|Application
    {
        abort_if(
            Gate::denies('recommendation_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        return view('recommendation::admin.recommendation.application_list');
    }

    public function index(ApplicationTypeEnum $applicationTypeEnum)
    {
        abort_if(
            Gate::denies('recommendation_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $recommendations = Recommendation::where('application_type', $applicationTypeEnum->value)->get();

        return view('recommendation::admin.recommendation.index', compact('applicationTypeEnum', 'recommendations'));
    }

    public function create(ApplicationTypeEnum $applicationTypeEnum)
    {
        abort_if(
            Gate::denies('recommendation_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );



        $definition = FormBuilder::where('application_type', $applicationTypeEnum->value)->latest()->first(); // get some definition JSON
        $data = '{}';

        return view('recommendation::admin.recommendation.create', compact('applicationTypeEnum', 'definition', 'data'));
    }

    public function store(Request $request, ApplicationTypeEnum $applicationTypeEnum)
    {
        abort_if(
            Gate::denies('recommendation_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );



        if ($request->get('state') === 'draft') {
            // Someone added a 'Save Draft' button to the form, and the user clicked that.
            // You can do some different behaviours if you'd like.
        }

        $data = $request->validateDynamicForm(
            FormBuilder::where('application_type', $applicationTypeEnum->value)->latest()->first(), // get some definition JSON
            $request->get('submissionValues')
        );

        dd($data);
        Recommendation::create($request->validated() + ['application_type' => $applicationTypeEnum->value]);

        toast('फारम सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function show(ApplicationTypeEnum $applicationTypeEnum, Recommendation $recommendation)
    {
        abort_if(
            Gate::denies('recommendation_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        return view('recommendation::admin.recommendation.show', compact('applicationTypeEnum', 'recommendation'));
    }

    public function edit(ApplicationTypeEnum $applicationTypeEnum, Recommendation $recommendation)
    {
        abort_if(
            Gate::denies('recommendation_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        return view('recommendation::admin.recommendation.edit', compact('applicationTypeEnum', 'recommendation'));
    }

    public function update(Request $request, ApplicationTypeEnum $applicationTypeEnum, Recommendation $recommendation)
    {
        abort_if(
            Gate::denies('recommendation_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $recommendation->update($request->validated());

        toast('फारम सफलतापूर्वक सम्पादन भयो', 'success');

        return back();
    }

    public function destroy(ApplicationTypeEnum $applicationTypeEnum, Recommendation $recommendation)
    {
        abort_if(
            Gate::denies('recommendation_delete'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $recommendation->delete();

        toast('फारम सफलतापूर्वक हटाइयो', 'success');

        return back();
    }
}
