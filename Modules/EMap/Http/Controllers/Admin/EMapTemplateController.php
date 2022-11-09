<?php

namespace Modules\EMap\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\EMap\Entities\EMapTemplate;
use Modules\EMap\Http\Requests\Template\StoreEMapTemplateRequest;

class EMapTemplateController extends Controller
{
    public function index()
    {
        $eMapTemplates=EMapTemplate::latest()->get();

        return view('emap::admin.template.index',compact('eMapTemplates'));
    }

    public function create()
    {
        return view('emap::admin.template.create');
    }

    public function store(StoreEMapTemplateRequest $request)
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
