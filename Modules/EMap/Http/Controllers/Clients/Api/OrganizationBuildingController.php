<?php

namespace Modules\EMap\Http\Controllers\Clients\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrganizationBuildingController extends Controller
{
    public function updateMapApplication(UpdateMapApplicationRequest $request, MapApply $mapApply)
    {
        $formData = $request->validated();

        DB::transaction(function () use ($formData, $mapApply) {
            if (empty($formData['structure_type_id']) && ! empty($formData['structure_type'])) {
                $structure_type = StructureType::create(['title' => $formData['structure_type']]);
                $formData['structure_type_id'] = $structure_type->id;
            }

            $mapApply->update($formData);
        });

        return response()->json([
            'message' => 'नक्सा आवेदन सफलतापूर्वक अद्यावधिक गरियो',
        ]);
    }


    public function create()
    {
        return view('emap::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('emap::show');
    }

    public function edit($id)
    {
        return view('emap::edit');
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
