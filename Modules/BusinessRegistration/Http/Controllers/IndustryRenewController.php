<?php

namespace Modules\BusinessRegistration\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\BusinessRegistration\Entities\Industry;
use Modules\BusinessRegistration\Entities\IndustryRenew;
use Modules\BusinessRegistration\Http\Requests\IndustryRenew\StoreIndustryRenewRequest;
use Modules\BusinessRegistration\Http\Requests\IndustryRenew\UpdateIndustryRenewRequest;
use Modules\ListRegistration\Entities\ListRegistration;

class IndustryRenewController extends Controller
{
    public function index(Industry $industry)
    {
        $industryRenews = IndustryRenew::with('fiscalYear')->where('industry_id', $industry->id)->where(function (Builder $q) {
            if (!is_null(request('search'))) {
                $q->whereLike(['date', 'payment_receipt'], request('search'));
            }
        })->latest()->paginate(15);
        return view('businessregistration::admin.industryRenew.index', compact('industry', 'industryRenews'));
    }

    public function create(Industry $industry)
    {
        return view('businessregistration::admin.industryRenew.create', compact('industry'));
    }

    public function store(StoreIndustryRenewRequest $request, Industry $industry)
    {
        $industry->industryRenew()->create($request->validated() + [
                'fiscal_year_id' => officeSetting()->fiscal_year_id,
            ]);
            if (!empty($request->validated()['files'])) {
                $this->uploadDocuments($request, $industry);
            }


        toast('व्यवसाय नवीकरण सफलतापूर्वक थपियो', 'success');
        return redirect(route('admin.businessRegistration.industry.industryRenew.index', $industry));
    }

    public function show(Industry $industry, IndustryRenew $industryRenew)
    {
        return view('businessregistration::admin.industryRenew.show', compact('industry', 'industryRenew'));
    }

    public function edit(Industry $industry, IndustryRenew $industryRenew)
    {
        return view('businessregistration::admin.industryRenew.edit', compact('industry', 'industryRenew'));
    }

    public function update(UpdateIndustryRenewRequest $request, Industry $industry, IndustryRenew $industryRenew)
    {
        $industryRenew->update($request->validated());

        if (!empty($request->validated()['files'])) {
            $this->uploadDocuments($request, $industryRenew);
        }

        toast('व्यवसाय नवीकरण सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.businessRegistration.industry.industryRenew.index', $industry));
    }


    public function destroy($id)
    {
        //
    }

    private function uploadDocuments($request, $industryRenew)
    {
        foreach ($request->validated()['files'] as $file) {
            $industryRenew->files()->create([
                'file_name' => $file['file_name'] ?? pathinfo($file['file']->getClientOriginalName(), PATHINFO_FILENAME),
                'extension' => $file['file']->getClientOriginalExtension(),
                'file' => $file['file']->store('industryRenew/' . Str::slug($industryRenew->main_person, '_') . '/files', 'public'),
            ]);
        }
    }
    public function updateFile(Request $request, IndustryRenew $industryRenew)
    {
        if ($request->hasFile('file') && $file = $industryRenew->getRawOriginal('file')) {
            $this->deleteFile($file);
        }
        $data = $request->validate([
            'file' => 'required |mimes:png,jpg,jpeg,pdf'
        ]);

        $industryRenew->update($data);
        toast('फाईल सफलतापूर्वक थपियो', 'success');
        return back();
    }

}
