<?php

namespace Modules\BusinessRegistration\Http\Controllers\Admin;

use App\Models\OfficeHeader;
use App\Traits\NepaliDateConverter;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\BusinessRegistration\Entities\OrganizationRegistration;
use Modules\BusinessRegistration\Entities\PrintedData;
use Modules\BusinessRegistration\Enums\TemplateTypeEnum;
use Modules\BusinessRegistration\Http\Requests\PrintedData\StorePrintedDataRequest;

class OrganizationRegistrationController extends Controller
{
    use NepaliDateConverter;

    public function index(): Factory|View|Application
    {
        $organizationRegistrations = OrganizationRegistration::with('committeeNames', 'committeeNames.localBody', 'localBody')->where(function (Builder $q) {
            if (!is_null(request('search'))) {
                $q->whereLike(['name', 'submission_no', 'registration_no'], request('search'));
            }

            if (!empty(request('to_date'))) {
                $q->whereDate('registration_date_ne', '>=', request('to_date'));
            }
            if (!empty(request('from_date'))) {
                $q->whereDate('registration_date_ne', '<=', request('from_date'));
            }
            if (!empty(request('registration_no'))) {
                $q->where('registration_no', request('registration_no'));
            }
        })->latest()
            ->paginate(15);
        return view('businessregistration::admin.organizationRegistration.index', compact('organizationRegistrations'));
    }

    public function show(OrganizationRegistration $organizationRegistration): Factory|View|Application
    {

        $organizationRegistration->load(
            ['committeeNames' => function ($query) {
                $query->with('issueDistrict', 'district', 'localBody');
            }, 'businessNature', 'registeredBusinesses']
        );

        return view('businessregistration::admin.organizationRegistration.show', compact('organizationRegistration'));
    }

    public function customData(Request $request, OrganizationRegistration $organizationRegistration)
    {

        $data = $request->validate([
            'bill_no' => ['required'],
            'bill_date_bs' => ['required'],
            'bill_date_ad' => ['required'],
            'other_file' => ['nullable', 'mimes:png,jpg,jpeg,pdf'],
            'amount' => ['required'],
            'taxpayer_number' => ['nullable'],
        ]);


        DB::transaction(function () use ($organizationRegistration, $data, $request) {
            if (empty($organizationRegistration->registration_no)) {
                $reg_no = OrganizationRegistration::whereFiscalYearId(\officeSetting()->fiscal_year_id)
                        ->max('reg_no') + 1;
                $data = array_merge($data, [
                    'reg_no' => $reg_no,
                    'fiscal_year_id' => \officeSetting()->fiscal_year_id,
                    'registration_no' => 'OR-' . officeSetting()->fiscalYear->title . '-' . Str::padLeft($reg_no, 4, 0),
                    'registration_date_en' => today()->toDateString(),
                    'registration_date_ne' => $this->get_today_nepali_date()
                ]);
            }

            $organizationRegistration->update($data);
        });
        toast('दस्तुर सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function edit(OrganizationRegistration $organizationRegistration)
    {
        $organizationRegistration->load('committeeNames', 'files');

        return view('businessregistration::admin.organizationRegistration.edit', compact('organizationRegistration'));
    }

    //    public function editData(OrganizationRegistration $organizationRegistrations, TemplateTypeEnum $templateTypeEnum): Factory|View|Application
    //    {
    //        $this->checkAuthorization('businessRegistration_edit');
    //
    //        $organizationRegistrations->load('printedData');
    //        $printed_data = $organizationRegistrations->printedData
    //            ->where('for', $templateTypeEnum)
    //            ->sortByDesc('created_at')
    //            ->first();
    //        return view('businessregistration::admin.businessRegistration.edit', compact('organizationRegistrations', 'templateTypeEnum', 'printed_data'));
    //    }

    public function storeData(StorePrintedDataRequest $request, OrganizationRegistration $organizationRegistration, $type): RedirectResponse
    {
        DB::transaction(function () use ($request, $organizationRegistration, $type) {
            $printed_data = PrintedData::updateOrCreate(
                [
                    'organization_registration_id' => $organizationRegistration->id,
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


    public function addData(OrganizationRegistration $organizationRegistration, TemplateTypeEnum $templateTypeEnum): Factory|View|Application
    {
        return view('businessregistration::admin.organizationRegistration.customs.index', compact('organizationRegistration', 'templateTypeEnum'));
    }


    public function print(OrganizationRegistration $organizationRegistration)
    {
        $officeHeaders = OfficeHeader::get();
        $organizationRegistration->load(
            ['committeeNames' => function ($query) {
                $query->with('issueDistrict', 'district', 'localBody', 'province');
            }, 'province', 'district', 'localBody']
        );

        return view('businessregistration::admin.organizationRegistration.print', compact('organizationRegistration', 'officeHeaders'));
    }
}
