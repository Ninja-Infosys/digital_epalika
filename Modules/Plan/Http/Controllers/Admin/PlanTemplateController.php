<?php

namespace Modules\Plan\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\EMap\Entities\EMapTemplate;
use Modules\Plan\Entities\PlanTemplate;
use Modules\Plan\Http\Requests\PlanArea\StorePlanAreaRequest;
use Modules\Plan\Http\Requests\Template\StorePlanTemplateRequest;

class PlanTemplateController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('planTemplate_access');

        $planTemplates = PlanTemplate::all();

        return view('plan::admin.setting.template.index', compact('planTemplates'));
    }

    public function create()
    {
        $this->checkAuthorization('planTemplate_create');

        return view('plan::admin.setting.template.create');
    }

    public function store(StorePlanTemplateRequest $request)
    {
        $this->checkAuthorization('planTemplate_create');

        EMapTemplate::create($request->validated());

        toast('टेम्प्लेट सफलतापूर्वक थपियो','success');
        return back();
    }

    public function edit(PlanTemplate $planTemplate)
    {
        $this->checkAuthorization('planTemplate_edit');

        return view('plan::edit');
    }

    public function update(Request $request, PlanTemplate $planTemplate)
    {
        $this->checkAuthorization('planTemplate_edit');
    }

    public function destroy(PlanTemplate $planTemplate)
    {
        $this->checkAuthorization('planTemplate_delete');
    }
}
