<?php

namespace Modules\EMap\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\EMap\Entities\OldMap;
use Modules\EMap\Entities\OldMapDocument;
use Modules\EMap\Enums\ApplicationFormTypeEnum;

class OldMapController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('oldMap_access');
        $oldMaps = OldMap::with('houseOwner', 'fiscalYear')->get();
        return view('emap::admin.oldMap.index', compact('oldMaps'));
    }

    public function create()
    {
        $this->checkAuthorization('oldMap_create');
        return view('emap::admin.oldMap.create');
    }


    public function show(OldMap $oldMap)
    {
        $oldMap->load('houseOwner', 'fiscalYear','oldMapDocuments');

        return view('emap::admin.oldMap.show', compact('oldMap'));
    }

    public function edit(OldMap $oldMap)
    {
        $this->checkAuthorization('oldMap_edit');
        $oldMap->load('houseOwner');
        return view('emap::admin.oldMap.edit', compact('oldMap'));
    }


    public function destroy(OldMap $oldMap)
    {
        $this->checkAuthorization('oldMap_delete');
        $oldMap->delete();
        toast('पुरानो नक्सा सफलतापूर्वक मेटाइयो', 'success');
        return back();
    }

    public function deleteOldMapDocument(OldMap $oldMap, OldMapDocument $oldMapDocument)
    {
        if ($oldMapDocument->document) {
            $this->deleteFile($oldMapDocument->document);
        }
        $oldMapDocument->delete();

        toast('फाइल सफलतापूर्वक मेटियो', 'success');

        return back();
    }
}
