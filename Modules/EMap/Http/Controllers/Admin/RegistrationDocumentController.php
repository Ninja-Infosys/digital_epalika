<?php

namespace Modules\EMap\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\EMap\Entities\RegistrationDocument;
use Modules\EMap\Http\Requests\RegistrationDocument\StoreRegistrationDocumentRequest;
use Modules\EMap\Http\Requests\RegistrationDocument\UpdateRegistrationDocumentRequest;

class RegistrationDocumentController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('registrationDocument_access');
        $registrationDocuments = RegistrationDocument::latest()->get();
        return view('emap::admin.registrationDocument.index',compact('registrationDocuments'));
    }

    public function create()
    {
        $this->checkAuthorization('registrationDocument_create');
        return view('emap::admin.registrationDocument.create');
    }

    public function store(StoreRegistrationDocumentRequest $request)
    {
        $this->checkAuthorization('registrationDocument_create');

        RegistrationDocument::create($request->validated());
        toast('दरखस्त कागजातहरू थपियो', 'success');
        return back();
    }

    public function show(RegistrationDocument $registrationDocument)
    {
        $this->checkAuthorization('registrationDocument_access');

        return view('emap::admin.registrationDocument.show',compact('registrationDocument'));
    }

    public function edit(RegistrationDocument $registrationDocument)
    {
        $this->checkAuthorization('registrationDocument_edit');

        return view('emap::admin.registrationDocument.edit',compact('registrationDocument'));
    }

    public function update(UpdateRegistrationDocumentRequest $request, RegistrationDocument $registrationDocument)
    {
        $this->checkAuthorization('registrationDocument_create');

        $registrationDocument->update($request->validated());
        toast('दरखस्त कागजातहरू सफलतापूर्वक सम्पादन गरियो', 'sucsess');
        return redirect(route('emap.admin.registrationDocument.index'));
    }

    public function destroy(RegistrationDocument $registrationDocument)
    {
        $this->checkAuthorization('registrationDocument_delete');
        $registrationDocument->delete();
        toast('दरखस्त कागजातहरू सफलतापूर्वक मेटाइयो', 'sucsess');
        return back();
    }
}
