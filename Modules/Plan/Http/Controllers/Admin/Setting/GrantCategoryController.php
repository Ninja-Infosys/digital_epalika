<?php

namespace Modules\Plan\Http\Controllers\Admin\Setting;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Modules\Grant\Entities\GrantDetail;
use Modules\Plan\Entities\GrantCategory;

class GrantCategoryController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('grantCategory_access');
        $grantCategorys = GrantCategory::all();
        return view('plan::admin.setting.category_type.index',compact('grantCategorys'));
    }

    public function create()
    {
        $this->checkAuthorization('grantCategory_create');
        return view('plan::admin.setting.category_type.create');
    }

    public function store(Request $request)
    {
    $this->checkAuthorization('grantCategory_create');
     GrantCategory::create($request->validate([
        'title'=>'required','string','max:255',
     ]));
     return redirect(route('admin.plan.grantCategory.index'));
    }

    public function edit(GrantCategory $grantCategory)
    {
        $this->checkAuthorization('grantCategory_edit');
        return view('plan::admin.setting.category_type.edit',compact('grantCategory'));
    }

    public function update(Request $request,GrantCategory $grantCategory)
    {
        $this->checkAuthorization('grantCategory_edit');
        $grantCategory->update($request->validate([
            'title'=>'nullable','string','max:255',
        ]));

        return redirect(route('admin.plan.grantCategory.index'));
    }

    public function destroy(GrantCategory $grantCategory)
    {
        $this->checkAuthorization('grantCategory_delete');
        $grantCategory->delete();
        return redirect(route('admin.plan.grantCategory.index'));

    }
}
