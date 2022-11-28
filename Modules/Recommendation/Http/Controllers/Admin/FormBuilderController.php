<?php

namespace Modules\Recommendation\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Recommendation\Entities\FormBuilder;
use Modules\Recommendation\Enums\ApplicationTypeEnum;
use Modules\Recommendation\Http\Requests\StoreFormBuilderRequest;
use Modules\Recommendation\Http\Requests\UpdateFormBuilderRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class FormBuilderController extends Controller
{
    public function index(ApplicationTypeEnum $applicationTypeEnum)
    {
        abort_if(
            Gate::denies('formBuilder_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $formBuilders = FormBuilder::where('application_type', $applicationTypeEnum->value)->latest()->get();

        return view('recommendation::admin.setting.form-builder.index', compact('formBuilders','applicationTypeEnum'));
    }

    public function create(ApplicationTypeEnum $applicationTypeEnum)
    {
        abort_if(
            Gate::denies('formBuilder_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        return view('recommendation::admin.setting.form-builder.create', compact('applicationTypeEnum'));
    }

    public function store(StoreFormBuilderRequest $request,ApplicationTypeEnum $applicationTypeEnum): RedirectResponse
    {
        abort_if(
            Gate::denies('formBuilder_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        FormBuilder::create($request->validated() + ['application_type' => $applicationTypeEnum->value]);

        toast('फारम सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function show(ApplicationTypeEnum $applicationTypeEnum,FormBuilder $formBuilder)
    {
        abort_if(
            Gate::denies('formBuilder_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $data = '{}';
        return view('recommendation::admin.setting.form-builder.show', compact([
            'formBuilder',
            'data',
            'applicationTypeEnum'
        ]));
    }

    public function edit(ApplicationTypeEnum $applicationTypeEnum,FormBuilder $formBuilder)
    {
        abort_if(
            Gate::denies('formBuilder_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $data = '{}';
        return view('recommendation::admin.setting.form-builder.edit',compact([
            'formBuilder',
            'data',
            'applicationTypeEnum'
        ]));
    }

    public function update(UpdateFormBuilderRequest $request, ApplicationTypeEnum $applicationTypeEnum,FormBuilder $formBuilder)
    {
        abort_if(
            Gate::denies('formBuilder_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $formBuilder->update($request->validated());

        toast('फारम सफलतापूर्वक सम्पादन भयो', 'success');

        return back();
    }

    public function destroy(ApplicationTypeEnum $applicationTypeEnum,FormBuilder $formBuilder)
    {
        abort_if(
            Gate::denies('formBuilder_delete'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $formBuilder->delete();

        toast('फारम सफलतापूर्वक हटाइयो', 'success');

        return back();
    }
}
