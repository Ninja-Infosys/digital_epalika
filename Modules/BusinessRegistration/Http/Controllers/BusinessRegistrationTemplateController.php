<?php

namespace Modules\BusinessRegistration\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\BusinessRegistration\Entities\BusinessRegistrationTemplate;
use Modules\BusinessRegistration\Http\Requests\BusinessRegistrationTemplate\StoreBusinessRegistrationTemplateRequest;
use Modules\BusinessRegistration\Http\Requests\BusinessRegistrationTemplate\UpdateBusinessRegistrationTemplateRequest;

class BusinessRegistrationTemplateController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('businessRegistrationTemplate_access'),
            403,
            'तपाईंलाई अनुमति छैन'
        );
        $businessRegistrationTemplates = BusinessRegistrationTemplate::latest()->get();
        return view('businessregistration::admin.setting.template.index',compact('businessRegistrationTemplates'));
    }

    public function create()
    {
        abort_if(Gate::denies('businessRegistrationTemplate_create'),
            403,
            'तपाईंलाई अनुमति छैन'
        );
        return view('businessregistration::admin.setting.template.create');
    }

    public function store(StoreBusinessRegistrationTemplateRequest $request)
    {
        abort_if(Gate::denies('businessRegistrationTemplate_create'),
            403,
            'तपाईंलाई अनुमति छैन'
        );

        $businessRegistrationTemplate = BusinessRegistrationTemplate::where('for',$request->input('for'))->first();
        if(empty($businessRegistrationTemplate))
        {
            BusinessRegistrationTemplate::create($request->validated());
            toast('टेम्प्लेट सफलतापूर्वक थपियो','success');
        }
        else{
            toast('टेम्प्लेट पहिले नै उपलब्ध छ','warning');
        }

        return back();
    }

    public function show(BusinessRegistrationTemplate $businessRegistrationTemplate)
    {
        abort_if(Gate::denies('businessRegistrationTemplate_access'),
            403,
            'तपाईंलाई अनुमति छैन'
        );
        return view('businessregistration::show');
    }

    public function edit(BusinessRegistrationTemplate $businessRegistrationTemplate)
    {

        abort_if(Gate::denies('businessRegistrationTemplate_edit'),
            403,
            'तपाईंलाई अनुमति छैन'
        );
        return view('businessregistration::admin.setting.template.edit',compact('businessRegistrationTemplate'));
    }

    public function update(UpdateBusinessRegistrationTemplateRequest $request, BusinessRegistrationTemplate $businessRegistrationTemplate)
    {
        abort_if(Gate::denies('businessRegistrationTemplate_edit'),
            403,
            'तपाईंलाई अनुमति छैन'
        );

        $businessRegistrationTemplate->update($request->validated());
        toast('टेम्प्लेट सफलतापूर्वक अद्यावधिक गरियो','success');
        return redirect(route('admin.businessRegistration.setting.businessRegistrationTemplate.index'));
    }

    public function destroy(BusinessRegistrationTemplate $businessRegistrationTemplate)
    {
        abort_if(Gate::denies('businessRegistrationTemplate_delete'),
            403,
            'तपाईंलाई अनुमति छैन'
        );

        $businessRegistrationTemplate->delete();
        toast('टेम्प्लेट सफलतापूर्वक मेटियो','success');
        return back();

    }
}
