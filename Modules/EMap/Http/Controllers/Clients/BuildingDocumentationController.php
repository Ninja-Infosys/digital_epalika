<?php

namespace Modules\EMap\Http\Controllers\Clients;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Modules\EMap\Entities\BuildingDocumentation;

class BuildingDocumentationController extends Controller
{
    public function index()
    {
        $buildingDocumentations = BuildingDocumentation::with('requiredDocument', 'neighbours', 'localBody')->where(function (Builder $q) {
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

        return view('emap::organization.application-form.index', compact('buildingDocumentations'));
    }

    public function create()
    {
        return view('emap::organization.application-form.create');
    }

    public function show(BuildingDocumentation $buildingDocumentation)
    {
        return view('emap::organization.application-form.show', compact('buildingDocumentation'));
    }

    public function edit(BuildingDocumentation $buildingDocumentation)
    {
        return view('emap::organization.application-form.edit', compact('buildingDocumentation'));
    }

    public function buildingDocumentationList(BuildingDocumentation $buildingDocumentation)
    {
        [$forms, $order] = $this->listForms($buildingDocumentation);
        return view('emap::organization.attach-document.index', compact('buildingDocumentation', 'forms', 'order'));
    }
}
