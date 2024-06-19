<?php

namespace Modules\EMap\Http\Controllers\Admin\BuildingDocumentation;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\EMap\Entities\BuildingDocumentationStep;

class BuildingDocumentationStepController extends Controller
{
    public function index()
    {
        $buildingDocumentationSteps = BuildingDocumentationStep::orderBy('order')->get();
        return view('emap::admin.buildingDocumentation.step.index', compact('buildingDocumentationSteps'));
    }

    public function create()
    {
        return view('emap::admin.buildingDocumentation.step.create');
    }



    public function edit(BuildingDocumentationStep $buildingDocumentationStep)
    {
        $buildingDocumentationStep->load('buildingFormDataTypes');
        return view('emap::admin.buildingDocumentation.step.edit', compact('buildingDocumentationStep'));
    }

    public function updateStatus(BuildingDocumentationStep $buildingDocumentationStep)
    {
        $buildingDocumentationStep->update([
            'status' => !$buildingDocumentationStep->status
        ]);
        toast('भवन अभिलेखिकरण मर्यादाक्रम सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }

    public function destroy(BuildingDocumentationStep $buildingDocumentationStep)
    {
        if ($buildingDocumentationStep->status) {
            toast('सक्रिय भएको भवन अभिलेखिकरण मर्यादाक्रम मेटाउन मनाहि छ', 'error');
            return back();
        }
        $buildingDocumentationStep->delete();
        toast('भवन अभिलेखिकरण मर्यादाक्रम मेटियो', 'success');
        return back();
    }
}
