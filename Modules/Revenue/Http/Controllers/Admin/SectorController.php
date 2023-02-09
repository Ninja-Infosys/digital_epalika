<?php

namespace Modules\Revenue\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Revenue\Entities\Sector;

class SectorController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('sector_access');
        $sectors = Sector::latest()->get();
        return view('revenue::admin.setting.sector.index', compact('sectors'));
    }

    public function create()
    {
        $this->checkAuthorization('sector_create');
        return view('revenue::admin.setting.tax-payer-type.create');
    }

    public function store(Request $request)
    {
        $this->checkAuthorization('sector_create');

        Sector::create($request->validated() + ['user_id' => auth()->id()]);

        toast('करदाताको प्रकार सफलतापुर्वक राखियो', 'success')->autoClose(2000)->timerProgressBar();
        return redirect()->back();
    }

    public function edit(Sector $sector)
    {
        $this->checkAuthorization('sector_edit');
        return view('revenue::admin.setting.tax-payer-type.edit', compact('taxPayerType'));
    }

    public function update(Request $request, Sector $sector)
    {
        $this->checkAuthorization('sector_edit');

        $sector->update($request->validated());

        toast('करदाताको प्रकार सफलतापुर्वक अपडेट भयो', 'success')->autoClose(2000)->timerProgressBar();
        return redirect()->route('admin.revenue.setting.taxPayerType.index');
    }

    public function destroy(Sector $sector)
    {
        $this->checkAuthorization('sector_delete');

        $sector->delete();

        toast('करदाताको प्रकार सफलतापुर्वक हटाइयो', 'success')->autoClose(2000)->timerProgressBar();
        return redirect()->route('admin.revenue.setting.taxPayerType.index');
    }
}
