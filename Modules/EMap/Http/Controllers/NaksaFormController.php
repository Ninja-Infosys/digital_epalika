<?php

namespace Modules\EMap\Http\Controllers;

use Illuminate\Http\Request;
use Modules\EMap\Entities\Form;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\EMap\Http\Requests\NaksaForm\StoreNaksaFormRequest;

class NaksaFormController extends Controller
{
    public function index()
    {
        $naksaForms = Form::latest()->get();
        return view('emap::admin.naksaPassForm.index',compact('naksaForms'));
    }

    public function create()
    {
        return view('emap::admin.naksaPassForm.create');
    }

    public function store(StoreNaksaFormRequest $request)
    {
        DB::transaction(function () use ($request) {
            $form = Form::create($request->validated());

            if (array_key_exists('fields', $request->validated())
                && !empty($request->validated()['fields'])) {

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

    public function edit(Form $naksaForm)
    {
        $naksaForm->load('formDocumentFormats');
        //dd($naksaForm);
        return view('emap::admin.naksaPassForm.edit',compact('naksaForm'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Form $naksaForm)
    {
        if ($naksaForm->status) {
            toast('सक्रिय भएको नक्शा पास समूह मेटाउन मनाहि छ', 'error');
            return back();
        }
        $naksaForm->delete();
        toast('नक्शा पास समूह मेटियो', 'success');
        return back();
    }
    public function updateStatus(Form $naksaForm)
    {
        $this->checkAuthorization('recommendationTemplate_access');

        $naksaForm->update([
            'status' => !$naksaForm->status
        ]);
        toast('नक्शा पास समूह सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }
}
