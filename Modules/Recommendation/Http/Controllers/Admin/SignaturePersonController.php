<?php

namespace Modules\Recommendation\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Lcobucci\JWT\Token\Signature;
use Modules\Recommendation\Entities\SignaturePerson;
use Modules\Recommendation\Http\Requests\SignatureDetail\UpdateSignatureRequest;
use Modules\Recommendation\Http\Requests\SignaturePerson\StoreSignaturePersonRequest;
use Modules\Recommendation\Http\Requests\SignaturePerson\UpdateSignaturePersonRequest;

class SignaturePersonController extends Controller
{
    public function index()
    {
        $signaturePersons =  SignaturePerson::all();
        return view('recommendation::admin.setting.signaturePerson.index',compact('signaturePersons'));
    }

    public function create()
    {
        return view('recommendation::admin.setting.signaturePerson.create');
    }

    public function store(StoreSignaturePersonRequest $request)
    {

        $signaturePerson = SignaturePerson::create($request->validated());
        toast('सिफारिस सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show($id)
    {
        return view('recommendation::show');
    }

    public function edit(SignaturePerson $signaturePerson)
    {
        return view('recommendation::admin.setting.signaturePerson.edit',compact('signaturePerson'));
    }

    public function update(UpdateSignaturePersonRequest $request, SignaturePerson $signaturePerson)
    {
        // dd($request->all());
        $signaturePerson->update($request->validated());
        toast('सिफारिस सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.recommendation.setting.signaturePerson.index',compact('signaturePerson')));
    }

    public function destroy(SignaturePerson $signaturePerson)
    {
        $signaturePerson->delete();
        toast('सिफारिस सफलतापूर्वक मेटियो', 'success');  
        return back();
    }
}
