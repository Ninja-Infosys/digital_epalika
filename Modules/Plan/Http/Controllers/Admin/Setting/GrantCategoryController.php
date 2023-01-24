<?php

namespace Modules\Plan\Http\Controllers\Admin\Setting;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Plan\Entities\GrantCategory;

class GrantCategoryController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('grantCategory_access');
        $grantCategorys = GrantCategory::all();
        return view('plan::admin.setting.grant_category.index',compact('grantCategorys'));

    }

    public function create()
    {
        return view('plan::admin.setting.grant_category.create');
    }

    public function store(Request $request)
    {
        $this->checkAuthorization('grantCategory_create');

        GrantCategory::create($request->validate([
            'title'=>'required','string','max:255'
        ]));
        toast('अनुदान प्रकार सफलतापूर्वक थपियो', 'success');
        return redirect(route('admin.plan.grantCategory.index'));

    }

    public function edit(GrantCategory $grantCategory)
    {
        $this->checkAuthorization('grantCategory_edit');

        return view('plan::admin.setting.grant_category.edit',compact('grantCategory'));
    }

    public function update(Request $request, GrantCategory $grantCategory)
    {
        $this->checkAuthorization('grantCategory_edit');

        $grantCategory->update($request->validate([
            'title'=>'required','string','max:255'
        ]));
        toast('अनुदान प्रकार सफलतापूर्वक सम्पादन गरियो', 'success');

        return redirect(route('admin.plan.grantCategory.index'));

    }

    public function destroy(GrantCategory $grantCategory)
    {
        $this->checkAuthorization('grantCategory_delete');

        $grantCategory->delete();
        toast('अनुदान प्रकार सफलतापूर्वक मेटियो', 'success');
        return redirect(route('admin.plan.grantCategory.index'));
    }
}
