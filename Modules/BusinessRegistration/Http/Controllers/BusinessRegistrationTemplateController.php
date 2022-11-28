<?php

namespace Modules\BusinessRegistration\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Modules\BusinessRegistration\Entities\BusinessRegistrationTemplate;
use Modules\BusinessRegistration\Http\Requests\BusinessRegistrationTemplate\StoreBusinessRegistrationTemplateRequest;
use Modules\BusinessRegistration\Http\Requests\BusinessRegistrationTemplate\UpdateBusinessRegistrationTemplateRequest;

class BusinessRegistrationTemplateController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('businessRegistrationTemplate_access');
        $businessRegistrationTemplates = BusinessRegistrationTemplate::latest()->get();

        return view('businessregistration::admin.setting.template.index', compact('businessRegistrationTemplates'));
    }

    public function create()
    {
        $this->checkAuthorization('businessRegistrationTemplate_create');

        return view('businessregistration::admin.setting.template.create');
    }

    public function store(StoreBusinessRegistrationTemplateRequest $request)
    {
        $this->checkAuthorization('businessRegistrationTemplate_create');

        $businessRegistrationTemplate = BusinessRegistrationTemplate::where('for', $request->input('for'))->first();
        if (empty($businessRegistrationTemplate)) {
            BusinessRegistrationTemplate::create($request->validated());
            toast('टेम्प्लेट सफलतापूर्वक थपियो', 'success');
        } else {
            toast('टेम्प्लेट पहिले नै उपलब्ध छ', 'warning');
        }

        return back();
    }

    public function show(BusinessRegistrationTemplate $businessRegistrationTemplate)
    {
        $this->checkAuthorization('businessRegistrationTemplate_access');

        return view('businessregistration::show');
    }

    public function edit(BusinessRegistrationTemplate $businessRegistrationTemplate)
    {
        $this->checkAuthorization('businessRegistrationTemplate_edit');

        return view('businessregistration::admin.setting.template.edit', compact('businessRegistrationTemplate'));
    }

    public function update(UpdateBusinessRegistrationTemplateRequest $request, BusinessRegistrationTemplate $businessRegistrationTemplate)
    {
        $this->checkAuthorization('businessRegistrationTemplate_edit');

        $businessRegistrationTemplate->update($request->validated());
        toast('टेम्प्लेट सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.businessRegistration.setting.businessRegistrationTemplate.index'));
    }

    public function destroy(BusinessRegistrationTemplate $businessRegistrationTemplate)
    {
        $this->checkAuthorization('businessRegistrationTemplate_delete');
    }


    public function getStaticTemplate(Request $request)
    {

        $request->validate([
            'type' => ['required'],
        ]);

        return match ($request->input('type')) {
            'level1' => \View::make('businessregistration::admin.setting.template.staticTemplate.business-registration-certificate'),
            default => 'Enter Valid Type',
        };
    }
}
