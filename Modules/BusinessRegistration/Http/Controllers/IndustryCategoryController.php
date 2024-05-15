<?php

namespace Modules\BusinessRegistration\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\BusinessRegistration\Entities\IndustryCategory;
use Modules\BusinessRegistration\Http\Requests\IndustryCategory\StoreIndustryCategory;
use Modules\BusinessRegistration\Http\Requests\IndustryCategory\UpdateIndustryCategory;

class IndustryCategoryController extends Controller
{
    public function index()
    {
        $industryCategories = IndustryCategory::latest()->get();
        return view('businessregistration::admin.setting.industryCategory.index', compact('industryCategories'));
    }

    public function create()
    {
        return view('businessregistration::create');
    }

    public function store(StoreIndustryCategory $request)
    {
       IndustryCategory::create($request->Validated());
        toast(' उधोग वर्ग सफलतापूर्वक थपियो', 'success');
        return redirect(route('admin.businessRegistration.setting.industryCategory.index'));
    }

    public function show(IndustryCategory $industryCategory)
    {
        return view('businessregistration::show');
    }

    public function edit(IndustryCategory $industryCategory)
    {
        return view('businessregistration::admin.setting.industryCategory.edit', compact('industryCategory'));
    }

    public function update(UpdateIndustryCategory $request, IndustryCategory $industryCategory)
    {
        $industryCategory->update($request->validated());
        toast(' उधोग वर्ग सफलतापूर्वक सम्पादन', 'success');
        return redirect(route('admin.businessRegistration.setting.industryCategory.index'));
    }

    public function destroy(IndustryCategory $industryCategory)
    {
        $industryCategory->delete();
        toast(' उधोग वर्ग सफलतापूर्वक मेटियो', 'success');
        return redirect(route('admin.businessRegistration.setting.industryCategory.index'));
    }
}
