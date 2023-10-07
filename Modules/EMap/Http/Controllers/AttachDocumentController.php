<?php

namespace Modules\EMap\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\EMap\Entities\AttachDocument;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\Form;
use Modules\EMap\Enums\EMapFormFillerTypeEnum;

class AttachDocumentController extends Controller
{
    public function index(MapApply $mapApply)
    {
        $forms = Form::orderBy('order')->get();
        return view('emap::organization.attach-document.index', compact('mapApply','forms'));
    }

    public function create()
    {
        return view('emap::create');
    }

    public function store(Request $request, MapApply $mapApply)
    {
        $data = $request->validate([
            'land_owner_document' => ['required', 'mimes:png,jpg,jpeg'],
            'land_revenue_document' => ['required', 'mimes:png,jpg,jpeg'],
            'land_owner_citizenship' => ['required', 'mimes:png,jpg,jpeg'],
            'blue_print' => ['required', 'mimes:png,jpg,jpeg'],
            'pass_document' => ['required', 'mimes:png,jpg,jpeg'],
            'designer_document' => ['required', 'mimes:png,jpg,jpeg'],
            'permission_document' => ['required', 'mimes:png,jpg,jpeg'],
            'inheritance_document' => ['required', 'mimes:png,jpg,jpeg'],
        ]);

        if ($request->hasFile('land_owner_document') && !empty($mapApply->attachDocument->land_owner_document)) {
            $this->deleteFile($mapApply->attachDocument->getRawOriginal('land_owner_document'));
        }

        if ($request->hasFile('land_revenue_document') && !empty($mapApply->attachDocument->land_revenue_document)) {
            $this->deleteFile($mapApply->attachDocument->getRawOriginal('land_revenue_document'));
        }

        if ($request->hasFile('land_owner_citizenship') && !empty($mapApply->attachDocument->land_owner_citizenship)) {
            $this->deleteFile($mapApply->attachDocument->getRawOriginal('land_owner_citizenship'));
        }

        if ($request->hasFile('blue_print') && !empty($mapApply->attachDocument->blue_print)) {
            $this->deleteFile($mapApply->attachDocument->getRawOriginal('blue_print'));
        }

        if ($request->hasFile('pass_document') && !empty($mapApply->attachDocument->pass_document)) {
            $this->deleteFile($mapApply->attachDocument->getRawOriginal('pass_document'));
        }

        if ($request->hasFile('designer_document') && !empty($mapApply->attachDocument->designer_document)) {
            $this->deleteFile($mapApply->attachDocument->getRawOriginal('designer_document'));
        }

        if ($request->hasFile('permission_document') && !empty($mapApply->attachDocument->permission_document)) {
            $this->deleteFile($mapApply->attachDocument->getRawOriginal('permission_document'));
        }

        if ($request->hasFile('inheritance_document') && !empty($mapApply->attachDocument->inheritance_document)) {
            $this->deleteFile($mapApply->attachDocument->getRawOriginal('inheritance_document'));
        }
        AttachDocument::updateOrCreate([
            'map_apply_id' => $mapApply->id
        ], $data);
        toast('File added successfully', 'success');
        return back();
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
