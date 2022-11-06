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
//        $businessRegistrationTemplates
        return view('businessregistration::admin.setting.template.index');
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
        return view('businessregistration::edit');
    }

    public function update(UpdateBusinessRegistrationTemplateRequest $request, BusinessRegistrationTemplate $businessRegistrationTemplate)
    {
        abort_if(Gate::denies('businessRegistrationTemplate_edit'),
            403,
            'तपाईंलाई अनुमति छैन'
        );
    }

    public function destroy(BusinessRegistrationTemplate $businessRegistrationTemplate)
    {
        abort_if(Gate::denies('businessRegistrationTemplate_delete'),
            403,
            'तपाईंलाई अनुमति छैन'
        );
    }
}
