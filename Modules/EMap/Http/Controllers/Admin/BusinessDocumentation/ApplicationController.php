<?php

namespace Modules\EMap\Http\Controllers\Admin\BusinessDocumentation;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\NepaliDateConverter;
use Modules\EMap\Entities\BuildingDocumentation;
use Illuminate\Database\Eloquent\Builder;

class ApplicationController extends Controller
{
    use NepaliDateConverter;
    public function index()
    {

        $applications = BuildingDocumentation::with('requiredDocument', 'neighbours', 'localBody')->where(function (Builder $q) {
            if (!is_null(request('search'))) {
                $q->whereLike(['house_owner_name', 'submission_no', 'registration_no'], request('search'));
            }
            if (!empty(request('to_date'))) {
                $q->whereDate('registration_date_ne', '>=', request('to_date'));
            }
            if (!empty(request('from_date'))) {
                $q->whereDate('registration_date_ne', '<=', request('from_date'));
            }
            if (!empty(request('registration_no'))) {
                $q->where('registration_no', request('registration_no'));
            }
        })->latest()
            ->paginate(15);


        return view('emap::admin.buildingDocumentation.application.index', compact('applications'));
    }

    public function edit(BuildingDocumentation $application)
    {
        $application->load('neighbours', 'files', 'requiredDocument');

        return view('emap::admin.buildingDocumentation.application.edit', compact('application'));
    }

    public function show(BuildingDocumentation $buildingDocumentation)
    {
        $buildingDocumentation->load(
            'neighbours',
            'requiredDocument',

        );

        return view('emap::admin.buildingDocumentation.application.show', compact('application'));
    }
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
