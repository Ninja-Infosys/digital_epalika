<?php

namespace Modules\Plan\Http\Controllers\Admin\Setting;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Modules\Grant\Entities\GrantDetail;
use Modules\Plan\Entities\GrantCategory;
use Modules\Plan\Http\Requests\GrantCategory\StoreGrantCategoryRequest;
use Modules\Plan\Http\Requests\GrantCategory\UpdateGrantCategoryRequest;

class GrantCategoryController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('grantCategory_access');

        $grantCategories = GrantCategory::all();

        return view('plan::admin.setting.grant_category.index',compact('grantCategories'));
    }

    public function create()
    {
        $this->checkAuthorization('grantCategory_create');

        return view('plan::admin.setting.grant_category.create');
    }

    public function store(StoreGrantCategoryRequest $request)
    {
    $this->checkAuthorization('grantCategory_create');

     GrantCategory::create($request->validated());

     toast('अनुदान प्रकार सफलतापूर्वक थपियो','success');
     return back();
    }

    public function edit(GrantCategory $grantCategory)
    {
        $this->checkAuthorization('grantCategory_edit');

        return view('plan::admin.setting.grant_category.edit',compact('grantCategory'));
    }

    public function update(UpdateGrantCategoryRequest $request,GrantCategory $grantCategory)
    {
        $this->checkAuthorization('grantCategory_edit');

        $grantCategory->update($request->validated());

        toast('अनुदान प्रकार सफलतापूर्वक अद्यावधिक गरियो','success');
        return redirect(route('admin.plan.grantCategory.index'));
    }

    public function destroy(GrantCategory $grantCategory)
    {
        $this->checkAuthorization('grantCategory_delete');

        $grantCategory->delete();

        toast('अनुदान प्रकार सफलतापूर्वक हटाइयो','success');
        return back();

    }
}
