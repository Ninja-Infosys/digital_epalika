<?php

namespace Modules\Recommendation\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Recommendation\Entities\FormBuilder;
use Modules\Recommendation\Http\Requests\StoreFormBuilderRequest;
use Modules\Recommendation\Http\Requests\UpdateFormBuilderRequest;

class FormBuilderController extends Controller
{
    public function index()
    {
        $formBuilders = FormBuilder::latest()->get();

        return view('recommendation::admin.setting.form-builder.index', compact('formBuilders'));
    }

    public function create()
    {
        return view('recommendation::admin.setting.form-builder.create');
    }

    public function store(StoreFormBuilderRequest $request): RedirectResponse
    {
        FormBuilder::create($request->validated());

        toast('फारम सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function show(FormBuilder $formBuilder)
    {
        return view('recommendation::admin.setting.form-builder.show', )->with([
            'formBuilder' => $formBuilder,
            'data' => '{}',
        ]);
    }

    public function edit(FormBuilder $formBuilder)
    {
        return view('recommendation::admin.setting.form-builder.edit', )->with([
            'formBuilder' => $formBuilder,
            'data' => '{}',
        ]);
    }

    public function update(UpdateFormBuilderRequest $request, FormBuilder $formBuilder)
    {
        $formBuilder->update($request->validated());

        toast('फारम सफलतापूर्वक सम्पादन भयो', 'success');

        return back();
    }

    public function destroy(FormBuilder $formBuilder)
    {
        $formBuilder->delete();

        toast('फारम सफलतापूर्वक हटाइयो', 'success');

        return back();
    }
}
