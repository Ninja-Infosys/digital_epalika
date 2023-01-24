<?php

namespace Modules\Plan\Http\Controllers\Admin\Setting;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GrantCategoryController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('grantCategory_access');

        return view('plan::index');
    }

    public function create()
    {
        return view('plan::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('plan::show');
    }

    public function edit($id)
    {
        return view('plan::edit');
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
