<?php

namespace Modules\BusinessRegistration\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\OfficeSetting;
use App\Traits\NepaliDateConverter;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\BusinessRegistration\Entities\BusinessDetail;
use Modules\BusinessRegistration\Entities\PrintedData;
use Modules\BusinessRegistration\Enums\TemplateTypeEnum;
use Modules\BusinessRegistration\Http\Requests\PrintedData\StorePrintedDataRequest;
use Illuminate\Database\Eloquent\Builder;

class BusinessRegistrationController extends Controller
{
    use NepaliDateConverter;

    public function index(): Factory|View|Application
    {
        $this->checkAuthorization('businessRegistration_access');

        $businessDetails = BusinessDetail::with('proprietorDetail')->where(function (Builder $q) {
            if (!is_null(request('search'))) {
                $q->whereLike(['title'], request('search'));
            }
        })->latest()
            ->paginate(15);

        return view('businessregistration::admin.businessRegistration.index', compact('businessDetails'));
    }

    public function show(BusinessDetail $businessDetail): Factory|View|Application
    {
        $this->checkAuthorization('businessRegistration_access');

        $businessDetail->load(
            'partnerDetails',
            'registeredBusinesses',
            'proprietorDetail',
            'proprietorDetail.province',
            'proprietorDetail.localBody',
            'proprietorDetail.threeGenerationDetails',
            'proprietorDetail.district'
        );

        $printed_data = PrintedData::where('business_detail_id', $businessDetail->id)
            ->latest()
            ->get();

        return view('businessregistration::admin.businessRegistration.show', compact('businessDetail', 'printed_data'));
    }

    public function editData(BusinessDetail $businessDetail, TemplateTypeEnum $templateTypeEnum): Factory|View|Application
    {
        $this->checkAuthorization('businessRegistration_edit');

        $businessDetail->load('printedData');
        $printed_data = $businessDetail->printedData
            ->where('for', $templateTypeEnum)
            ->sortByDesc('created_at')
            ->first();


        return view('businessregistration::admin.businessRegistration.edit', compact('businessDetail', 'templateTypeEnum', 'printed_data'));
    }

    public function storeData(StorePrintedDataRequest $request, BusinessDetail $businessDetail, $type): RedirectResponse
    {
        $this->checkAuthorization('businessRegistration_edit');
        DB::transaction(function () use ($request, $businessDetail, $type) {
            $printed_data = PrintedData::updateOrCreate(
                [
                    'business_detail_id' => $businessDetail->id,
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


    public function addData(BusinessDetail $businessDetail, TemplateTypeEnum $templateTypeEnum): Factory|View|Application
    {
        $this->checkAuthorization('customs_edit');
        return view('businessregistration::admin.businessRegistration.customs.index', compact('businessDetail', 'templateTypeEnum'));
    }

    public function customData(Request $request, BusinessDetail $businessDetail, $type): RedirectResponse
    {
        $this->checkAuthorization('customs_edit');

        $data = $request->validate([
            'application_fee' => ['required'],
            'registration_fee' => ['required'],
            'business_tax' => ['required'],
            'introduction_board_fees' => ['required'],
            'fine' => ['required'],
        ]);

        DB::transaction(function () use ($businessDetail, $data) {
            if (empty($businessDetail->registration_no)) {
                $fiscal_year = OfficeSetting::first()->fiscal_year_id ?? null;

                $registrationNo = BusinessDetail::whereFiscalYearId($fiscal_year)
                        ->max('registration_no') + 1;

                $data = array_merge($data, [
                    'fiscal_year_id' => $fiscal_year,
                    'registration_no' => $registrationNo,
                    'registration_date_en' => today()->toDateString(),
                    'registration_date_ne' => $this->get_today_nepali_date()
                ]);
            }

            $businessDetail->update($data);
        });


        toast('दस्तुर सफलतापूर्वक थपियो', 'success');

        return back();
    }
}
