<?php

namespace Modules\BusinessRegistration\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\BusinessRegistration\Entities\ObjectTransaction;
use Modules\BusinessRegistration\Entities\ObjectTransactionSubCategory;
use Modules\BusinessRegistration\Http\Requests\ObjectTransactionSubCategory\StoreObjectTransactionSubCategoryRequest;
use Modules\BusinessRegistration\Http\Requests\ObjectTransactionSubCategory\UpdateObjectTransactionSubCategoryRequest;

class ObjectTransactionSubCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('objectTransactionSubCategory_access'),
            403,
            'You are not allowed to digital board news access'
        );
        $objectTransactionSubCategories = ObjectTransactionSubCategory::with('objectTransaction')->get();

        return view('businessregistration::admin.setting.objectTransactionSubCategory.index', compact('objectTransactionSubCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('objectTransactionSubCategory_create'),
            403,
            'You are not allowed to digital board news access'
        );
        $all_objectTransactions = ObjectTransaction::get();

        return view('businessregistration::admin.setting.objectTransactionSubCategory.create', compact('all_objectTransactions'));
    }

    public function store(StoreObjectTransactionSubCategoryRequest $request)
    {
        abort_if(Gate::denies('objectTransactionSubCategory_create'),
            403,
            'You are not allowed to digital board news access'
        );
        ObjectTransactionSubCategory::create($request->validated());
        toast(' कारोबार गर्ने वस्तु  सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return back();
    }

    public function show($id)
    {
        abort_if(Gate::denies('objectTransactionSubCategory_access'),
            403,
            'You are not allowed to digital board news access'
        );

        return view('businessregistration::show');
    }

    public function edit(ObjectTransactionSubCategory $objectTransactionSubCategory)
    {
        abort_if(Gate::denies('objectTransactionSubCategory_edit'),
            403,
            'You are not allowed to digital board news access'
        );
        $all_objectTransactions = ObjectTransaction::get();

        return view('businessregistration::admin.setting.objectTransactionSubCategory.edit', compact('objectTransactionSubCategory', 'all_objectTransactions'));
    }

    public function update(UpdateObjectTransactionSubCategoryRequest $request, ObjectTransactionSubCategory $objectTransactionSubCategory)
    {
        abort_if(Gate::denies('objectTransactionSubCategory_edit'),
            403,
            'You are not allowed to digital board news access'
        );
        $objectTransactionSubCategory->update($request->validated());
        toast('  सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.businessRegistration.setting.objectTransactionSubCategory.index'));
    }

    public function destroy(ObjectTransactionSubCategory $objectTransactionSubCategory)
    {
        abort_if(Gate::denies('objectTransactionSubCategory_delete'),
            403,
            'You are not allowed to digital board news access'
        );
        $objectTransactionSubCategory->delete();

        return back();
    }
}
