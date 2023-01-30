<?php

namespace Modules\Recommendation\Http\Controllers\admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Recommendation\Entities\PersonalDetail;

class PersonalDetailController extends Controller
{
    public function index()
    {
        $personaldetails = PersonalDetail::all();
        return view('recommendation::admin.setting.personalDetail.index');
    }

    public function create()
    {
        return view('recommendation::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('recommendation::show');
    }

    public function edit($id)
    {
        return view('recommendation::edit');
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
