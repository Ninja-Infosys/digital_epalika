<?php

namespace Modules\EMap\Http\Controllers;

use Illuminate\Http\Request;
use Modules\EMap\Entities\Form;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\EMap\Entities\New\MapPassGroup;
use Modules\EMap\Enums\FormTypeEnum;
use Modules\EMap\Http\Requests\NaksaForm\StoreFormRequest;

class FormController extends Controller
{
    public function index()
    {
        $forms = Form::orderBy('order')->get();
        return view('emap::admin.form.index', compact('forms'));
    }

    public function create()
    {
        $mapPassGroups = MapPassGroup::latest()->get();
        return view('emap::admin.form.create', compact('mapPassGroups'));
    }

    public function store(StoreFormRequest $request)
    {
        DB::transaction(function () use ($request) {
            $form = Form::create($request->validated());

            if (array_key_exists('fields', $request->validated())
                && !empty($request->validated()['fields'])
                && $request->input('form_type') == FormTypeEnum::FILE->value
            ) {

                foreach ($request->validated()['fields'] as $field) {
                    $form->formDocumentFormats()->create($field);
                }

            }
        });
        toast('सिफारिस सफलतापूर्वक थपियो', 'success');
        return back();

    }

    public function show($id)
    {
        return view('emap::show');
    }

    public function edit(Form $form)
    {
        $form->load('formDocumentFormats')->loadCount('formDocumentFormats');
        $mapPassGroups = MapPassGroup::latest()->get();
        return view('emap::admin.form.edit', compact('form', 'mapPassGroups'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Form $form)
    {
        if ($form->status) {
            toast('सक्रिय भएको नक्शा पास समूह मेटाउन मनाहि छ', 'error');
            return back();
        }
        $form->delete();
        toast('नक्शा पास समूह मेटियो', 'success');
        return back();
    }

    public function updateStatus(Form $form)
    {
        $this->checkAuthorization('recommendationTemplate_access');

        $form->update([
            'status' => !$form->status
        ]);
        toast('नक्शा पास समूह सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }
}
