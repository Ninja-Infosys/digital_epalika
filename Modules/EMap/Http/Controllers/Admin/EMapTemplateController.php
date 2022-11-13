<?php

namespace Modules\EMap\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Modules\EMap\Entities\EMapTemplate;
use Modules\EMap\Http\Requests\Template\StoreEMapTemplateRequest;
use Modules\EMap\Http\Requests\Template\UpdateEMapTemplateRequest;

class EMapTemplateController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('eMapTemplate_access'),
            403,
            'You are not allowed to access this resource'
        );

        $eMapTemplates = EMapTemplate::latest()->get();

        return view('emap::admin.template.index', compact('eMapTemplates'));
    }

    public function create()
    {
        abort_if(Gate::denies('eMapTemplate_create'),
            403,
            'You are not allowed to access this resource'
        );

        return view('emap::admin.template.create');
    }

    public function store(StoreEMapTemplateRequest $request)
    {
        abort_if(Gate::denies('eMapTemplate_create'),
            403,
            'You are not allowed to access this resource'
        );

        EMapTemplate::create($request->validated());

        toast('टेम्प्लेट सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(EMapTemplate $eMapTemplate)
    {
        abort_if(Gate::denies('eMapTemplate_access'),
            403,
            'You are not allowed to access this resource'
        );

        return view('emap::show');
    }

    public function edit(EMapTemplate $eMapTemplate)
    {
        abort_if(Gate::denies('eMapTemplate_edit'),
            403,
            'You are not allowed to access this resource'
        );

        return view('emap::admin.template.edit', compact('eMapTemplate'));
    }

    public function update(UpdateEMapTemplateRequest $request, EMapTemplate $eMapTemplate)
    {
        abort_if(Gate::denies('eMapTemplate_edit'),
            403,
            'You are not allowed to access this resource'
        );

        $eMapTemplate->update($request->validated());

        toast('टेम्प्लेट सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('emap.admin.eMapTemplate.index'));
    }

    public function destroy(EMapTemplate $eMapTemplate)
    {
        abort_if(Gate::denies('eMapTemplate_delete'),
            403,
            'You are not allowed to access this resource'
        );
    }


    public function getStaticTemplate(Request $request)
    {
        abort_if(Gate::denies('eMapTemplate_create'),
            403,
            'You are not allowed to access this resource'
        );

        $request->validate([
            'type' => ['required']
        ]);

        return match ($request->input('type')) {
            'naksa_certificate' => \View::make('emap::admin.notice.naksa_certificate'),
            'level' => \View::make('emap::admin.notice.level'),
            'superstructure' => \View::make('emap::admin.notice.superstructure'),
            'construction-completion-certificate' => \View::make('emap::admin.notice.building_construction_completion_certificate'),
            default => 'Enter Valid Type',
        };


    }
}
