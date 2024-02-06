<?php

namespace Modules\EMap\Http\Controllers\Clients\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\StructureType;
use Modules\EMap\Http\Requests\Api\Organization\UpdateMapApplicationRequest;

class OrganizationApplicationsController extends Controller
{
    public function updateMapApplication(UpdateMapApplicationRequest $request, MapApply $mapApply)
    {
        $formData = $request->validated();

        DB::transaction(function () use ($formData, $mapApply) {
            if (empty($formData['structure_type_id']) && !empty($formData['structure_type'])) {
                $structure_type = StructureType::create(['title' => $formData['structure_type']]);
                $formData['structure_type_id'] = $structure_type->id;
            }

            $mapApply->update($formData);
        });

        return response()->json([
            'message' => 'नक्सा आवेदन सफलतापूर्वक अद्यावधिक गरियो'
        ]);
    }
}
