<?php

namespace Modules\Recommendation\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Recommendation\Entities\FormBuilder;
use Modules\Recommendation\Http\Requests\StoreFormBuilderRequest;
use Modules\Recommendation\Http\Requests\UpdateFormBuilderRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class FormBuilderController extends Controller
{
    public function index()
    {
        abort_if(
            Gate::denies('FormBuilder_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $formBuilders = FormBuilder::latest()->get();

        return view('recommendation::admin.setting.form-builder.index', compact('formBuilders'));
    }

    public function create()
    {
        abort_if(
            Gate::denies('FormBuilder_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        return view('recommendation::admin.setting.form-builder.create');
    }

    public function store(StoreFormBuilderRequest $request): RedirectResponse
    {
        abort_if(
            Gate::denies('FormBuilder_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        FormBuilder::create($request->validated());

        toast('फारम सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function show(FormBuilder $formBuilder)
    {
        abort_if(
            Gate::denies('FormBuilder_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        return view('recommendation::admin.setting.form-builder.show',)->with([
            'formBuilder' => $formBuilder,
            'data' => '{}',
        ]);
    }

    public function edit(FormBuilder $formBuilder)
    {
        abort_if(
            Gate::denies('FormBuilder_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        return view('recommendation::admin.setting.form-builder.edit',)->with([
            'formBuilder' => $formBuilder,
            'data' => '{}',
        ]);
    }

    public function update(UpdateFormBuilderRequest $request, FormBuilder $formBuilder)
    {
        abort_if(
            Gate::denies('FormBuilder_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $formBuilder->update($request->validated());

        toast('फारम सफलतापूर्वक सम्पादन भयो', 'success');

        return back();
    }

    public function destroy(FormBuilder $formBuilder)
    {
        abort_if(
            Gate::denies('FormBuilder_delete'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $formBuilder->delete();

        toast('फारम सफलतापूर्वक हटाइयो', 'success');

        return back();
    }
}
