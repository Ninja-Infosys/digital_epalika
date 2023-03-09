<?php

namespace Modules\EMap\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\EMap\Entities\AttachDocument;
use Modules\EMap\Entities\MapApply;

class AttachDocumentController extends Controller
{
    public function index(MapApply $mapApply)
    {

        $mapApply->load('attachDocument');

        return view('emap::organization.attach-document.index', compact('mapApply'));
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

        AttachDocument::updateOrCreate($data, [
            'map_apply_id' => $mapApply->id
        ]);
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
