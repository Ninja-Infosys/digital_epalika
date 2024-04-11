<?php

namespace Modules\EMap\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Modules\EMap\Entities\OldMap;
use Modules\EMap\Entities\OldMapDocument;
use Modules\EMap\Enums\ApplicationFormTypeEnum;

use Illuminate\Database\Eloquent\Builder;


class OldMapController extends Controller
{
    public function index(): Factory|View|Application
    {
        $this->checkAuthorization('oldMap_access');
        $oldMaps = OldMap::with('houseOwner', 'fiscalYear')
            ->withCount(['houseOwner' => function ($q) {
                $q->whereNotNull('registration_no');
            }])->where(function (Builder $q) {
                if (!is_null(request('search'))) {
                    $q->whereLike(['registration_no', 'registration_date', 'fiscal_year_id', 'houseOwner.name'], request('search'));
                }
            })->latest()->get();
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
