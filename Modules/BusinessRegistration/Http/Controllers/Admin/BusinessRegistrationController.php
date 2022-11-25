<?php

namespace Modules\BusinessRegistration\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\OfficeSetting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Modules\BusinessRegistration\Entities\BusinessDetail;
use Modules\BusinessRegistration\Entities\Customs;
use Modules\BusinessRegistration\Entities\PrintedData;
use Modules\BusinessRegistration\Entities\ProprietorDetail;
use Modules\BusinessRegistration\Http\Requests\PrintedData\StorePrintedDataRequest;

class BusinessRegistrationController extends Controller
{
    public function index(): Factory|View|Application
    {
        abort_if(
            Gate::denies('businessRegistration_access'),
            403,
            'You not allowed to access this resource'
        );
        $proprietors = ProprietorDetail::with('province', 'district', 'localBody', 'threeGenerationDetails', 'introboard', 'businessDetail.province', 'businessDetail.district', 'businessDetail.localBody', 'businessRegisteredFile', 'businessDetail.partnerDetails', 'businessDetail.registeredBusinesses')
            ->latest()
            ->paginate(15);

        return view('businessregistration::admin.businessRegistration.index', compact('proprietors'));
    }

    public function show($id): Factory|View|Application
    {

        abort_if(
            Gate::denies('businessRegistration_access'),
            403,
            'You not allowed to access this resource'
        );

        $proprietorDetail = ProprietorDetail::findOrFail($id);
        $proprietorDetail->load('province', 'district', 'localBody', 'threeGenerationDetails', 'introboard', 'businessDetail.province', 'businessDetail.district', 'businessDetail.localBody', 'businessRegisteredFile', 'businessDetail.partnerDetails', 'businessDetail.registeredBusinesses');

        $printed_data = PrintedData::where('proprietor_detail_id', $id)
            ->latest()
            ->get();

        return view('businessregistration::admin.businessRegistration.show', compact('proprietorDetail', 'printed_data'));
    }

    public function editData($id, $type): Factory|View|Application
    {
        abort_if(
            Gate::denies('businessRegistration_edit'),
            403,
            'You not allowed to access this resource'
        );

        $proprietorDetail = ProprietorDetail::findOrFail($id);

        $printed_data = PrintedData::where(
            [
                'proprietor_detail_id' => $id,
                'for' => $type,
            ]
        )->latest()->first();

        return view('businessregistration::admin.businessRegistration.edit', compact('proprietorDetail', 'type', 'printed_data'));
    }

    public function storeData(StorePrintedDataRequest $request, $id, $type): RedirectResponse
    {

        abort_if(
            Gate::denies('businessRegistration_edit'),
            403,
            'You not allowed to access this resource'
        );
        DB::transaction(function () use ($request, $id, $type) {
            $printed_data = PrintedData::updateOrCreate(
                [
                    'proprietor_detail_id' => $id,
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


    public function addData($id, $type): Factory|View|Application
    {

        abort_if(
            Gate::denies('customs_edit'),
            403,
            'You not allowed to access this resource'
        );
        $proprietorDetail = ProprietorDetail::find($id);
        $customs = Customs::where('proprietor_detail_id', $id)->first();
        return view('businessregistration::admin.businessRegistration.customs.index', compact('proprietorDetail', 'type', 'customs'));
    }

    public function customData(Request $request, $id, $type): RedirectResponse
    {

        abort_if(
            Gate::denies('customs_edit'),
            403,
            'You not allowed to access this resource'
        );

        $data = $request->validate([
            'application_fee' => ['required'],
            'registration_fee' => ['required'],
            'business_tax' => ['required'],
            'introduction_board_fees' => ['required'],
            'fine' => ['required'],
            'date' => ['nullable'],
            'registration_no' => ['nullable'],
        ]);

        DB::transaction(function () use ($id, $data) {
            $customs = Customs::updateOrCreate([
                'proprietor_detail_id' => $id
            ],
                $data);
        });


        toast('दस्तुर सफलतापूर्वक थपियो', 'success');

        return back();

    }
}
