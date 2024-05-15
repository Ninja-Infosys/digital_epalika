<?php

namespace Modules\BusinessRegistration\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OfficeHeader;
use App\Traits\NepaliDateConverter;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\BusinessRegistration\Entities\Industry;
use Modules\BusinessRegistration\Entities\IndustryCategory;
use Modules\BusinessRegistration\Entities\PrintedData;
use Modules\BusinessRegistration\Enums\TemplateTypeEnum;
use Modules\BusinessRegistration\Http\Requests\PrintedData\StorePrintedDataRequest;

class IndustryController extends Controller
{
    use NepaliDateConverter;

    public function index(): Factory|View|Application
    {
        $industries = Industry::with('committeeNames', 'committeeNames.localBody', 'localBody')->where(function (Builder $q) {
            if (! is_null(request('search'))) {
                $q->whereLike(['name', 'submission_no', 'registration_no'], request('search'));
            }
            if (! empty(request('to_date'))) {
                $q->whereDate('registration_date_ne', '>=', request('to_date'));
            }
            if (! empty(request('from_date'))) {
                $q->whereDate('registration_date_ne', '<=', request('from_date'));
            }
            if (! empty(request('registration_no'))) {
                $q->where('registration_no', request('registration_no'));
            }
        })->latest()
            ->paginate(15);

        $industryCategories = IndustryCategory::all();

        return view('businessregistration::admin.industry.index', compact('industries', 'industryCategories'));
    }

    public function show(Industry $industry)
    {
        $industry->load(
            'committeeNames.issueDistrict',
            'committeeNames.district',
            'committeeNames.localBody',
            'industryCategory'
        );

        return view('businessregistration::admin.industry.show', compact('industry'));
    }

    public function customData(Request $request, Industry $industry)
    {

        $data = $request->validate([
            'bill_no' => ['required'],
            'bill_date_bs' => ['required'],
            'bill_date_ad' => ['required'],
            'other_file' => ['nullable', 'mimes:png,jpg,jpeg,pdf'],
            'amount' => ['required'],
            'taxpayer_number' => ['nullable'],
        ]);

        DB::transaction(function () use ($industry, $data) {
            if (empty($industry->registration_no)) {
                $reg_no = Industry::whereFiscalYearId(\officeSetting()->fiscal_year_id)
                        ->max('reg_no') + 1;
                $data = array_merge($data, [
                    'reg_no' => $reg_no,
                    'fiscal_year_id' => \officeSetting()->fiscal_year_id,
                    'registration_no' => 'IN-'.officeSetting()->fiscalYear->title.'-'.Str::padLeft($reg_no, 4, 0),
                    'registration_date_en' => today()->toDateString(),
                    'registration_date_ne' => $this->get_today_nepali_date(),
                ]);
            }

            $industry->update($data);
        });
        toast('दस्तुर सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function edit(Industry $industry)
    {
        $industry->load('committeeNames', 'files');

        return view('businessregistration::admin.industry.edit', compact('industry'));
    }

    //    public function editData(Industry $Industries, TemplateTypeEnum $templateTypeEnum): Factory|View|Application
    //    {
    //        $this->checkAuthorization('businessRegistration_edit');
    //
    //        $Industries->load('printedData');
    //        $printed_data = $Industries->printedData
    //            ->where('for', $templateTypeEnum)
    //            ->sortByDesc('created_at')
    //            ->first();
    //        return view('businessregistration::admin.businessRegistration.edit', compact('Industries', 'templateTypeEnum', 'printed_data'));
    //    }

    public function storeData(StorePrintedDataRequest $request, Industry $industry, $type): RedirectResponse
    {
        DB::transaction(function () use ($request, $industry, $type) {
            $printed_data = PrintedData::updateOrCreate(
                [
                    'organization_registration_id' => $industry->id,
                    'for' => $type,
                ],
                [
                    'data' => $request->input('data'),
                ]
            );

            if ($request->hasFile('files')) {
                $this->uploadDocuments($request, $printed_data);
            }
        });

        toast('फाइल सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return back();
    }

    private function uploadDocuments($request, $printed_data): void
    {
        foreach ($request->validated()['files'] as $document) {
            $printed_data->files()->create([
                'file_name' => pathinfo($document->getClientOriginalName(), PATHINFO_FILENAME),
                'extension' => $document->getClientOriginalExtension(),
                'file' => $document->store('PrintedFile', 'public'),
            ]);
        }
    }

    public function addData(Industry $industry, TemplateTypeEnum $templateTypeEnum): Factory|View|Application
    {
        return view('businessregistration::admin.industry.customs.index', compact('industry', 'templateTypeEnum'));
    }

    public function printData(Industry $industry)
    {
        $officeHeaders = OfficeHeader::get();
        $industry->load(
            ['committeeNames' => function ($query) {
                $query->with('issueDistrict', 'district', 'localBody', 'province');
            }, 'industryCategory','province', 'district', 'localBody']
        );

        return view('businessregistration::admin.industry.printData', compact('industry', 'officeHeaders'));
    }
}
