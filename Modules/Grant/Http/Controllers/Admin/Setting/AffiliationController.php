<?php

namespace Modules\Grant\Http\Controllers\Admin\Setting;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Grant\Entities\Affiliation;

class AffiliationController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('affiliation_access');
        $affiliations = Affiliation::latest()->get();
        return view('grant::admin.setting.affiliation.index', compact('affiliations'));
    }

    public function create()
    {
        return view('grant::create');
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
        return view('grant::show');
    }

    public function edit($id)
    {
        return view('grant::edit');
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
