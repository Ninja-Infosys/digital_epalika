<?php

namespace Modules\TaskManagement\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\TaskManagement\Entities\MainCategory;
use Modules\TaskManagement\Http\Requests\MainCategory\StoreMainCategoryActivityRequest;

class CategoryController extends Controller
{
    public function index()
    {
        return view('taskmanagement::admin.main_category.index');
    }

    public function create()
    {
        return view('taskmanagement::admin.main_category.create');
    }

    public function store(StoreMainCategoryActivityRequest $request)
    {
        MainCategory::create($request->validated());

        toast('शाखाहरु अनुसार कार्यहरू सफलतापूर्वक थपियो','success');
        return back();
    }

    public function show($id)
    {
        return view('taskmanagement::show');
    }

    public function edit($id)
    {
        return view('taskmanagement::edit');
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
