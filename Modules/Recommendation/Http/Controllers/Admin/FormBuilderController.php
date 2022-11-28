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
        $this->checkAuthorization('formBuilder_access');

        $formBuilders = FormBuilder::latest()->get();

        return view('recommendation::admin.setting.form-builder.index', compact('formBuilders'));
    }

    public function create()
    {
        $this->checkAuthorization('formBuilder_create');

        return view('recommendation::admin.setting.form-builder.create');
    }

    public function store(StoreFormBuilderRequest $request): RedirectResponse
    {
        $this->checkAuthorization('formBuilder_create');

        FormBuilder::create($request->validated());

        toast('फारम सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function show(FormBuilder $formBuilder)
    {
        $this->checkAuthorization('formBuilder_access');

        return view('recommendation::admin.setting.form-builder.show',)->with([
            'formBuilder' => $formBuilder,
            'data' => '{}',
        ]);
    }

    public function edit(FormBuilder $formBuilder)
    {
        $this->checkAuthorization('formBuilder_edit');

        return view('recommendation::admin.setting.form-builder.edit',)->with([
            'formBuilder' => $formBuilder,
            'data' => '{}',
        ]);
    }

    public function update(UpdateFormBuilderRequest $request, FormBuilder $formBuilder)
    {
        $this->checkAuthorization('formBuilder_edit');

        $formBuilder->update($request->validated());

        toast('फारम सफलतापूर्वक सम्पादन भयो', 'success');

        return back();
    }

    public function destroy(FormBuilder $formBuilder)
    {
        $this->checkAuthorization('formBuilder_delete');

        $formBuilder->delete();

        toast('फारम सफलतापूर्वक हटाइयो', 'success');

        return back();
    }
}
