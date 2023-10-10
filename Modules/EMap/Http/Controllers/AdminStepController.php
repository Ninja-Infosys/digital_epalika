<?php

namespace Modules\EMap\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\EMap\Entities\Form;
use Modules\EMap\Entities\MapApply;

class AdminStepController extends Controller
{
    public function formList(MapApply $mapApply)
    {
        $forms = Form::with('formDataTypes')->orderBy('order')->get();
        return view('emap::admin.step.formList', compact('mapApply', 'forms'));
    }

    public function viewDetail(MapApply $mapApply, Form $form)
    {
        $form->load('formDataTypes.model', 'formDataTypes.appliedDocuments', 'formDataTypes.formStores');
        return view('emap::admin.step.formDetail', compact('mapApply', 'form'));
    }

    public function fillDetail(MapApply $mapApply, Form $form)
    {
        $form->load('formDataTypes.model', 'formDataTypes.appliedDocuments', 'formDataTypes.formStores');
        return view('emap::admin.step.formFill', compact('mapApply', 'form'));
    }
}
