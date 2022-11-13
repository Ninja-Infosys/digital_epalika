<?php

namespace Modules\BusinessRegistration\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\BusinessRegistration\Entities\PrintedData;
use Modules\BusinessRegistration\Entities\ProprietorDetail;
use Modules\BusinessRegistration\Http\Requests\PrintedData\StorePrintedDataRequest;

class BusinessRegistrationController extends Controller
{
    public function index()
    {
        $proprietors = ProprietorDetail::with('province', 'district', 'localBody', 'threeGenerationDetails', 'introboard', 'businessDetail.province', 'businessDetail.district', 'businessDetail.localBody', 'businessRegisteredFile', 'businessDetail.partnerDetails', 'businessDetail.registeredBusinesses')
            ->latest()
            ->get();

        return view('businessregistration::admin.businessRegistration.index', compact('proprietors'));
    }

    public function show($id)
    {
        $proprietorDetail = ProprietorDetail::findOrFail($id);
        $proprietorDetail->load('province', 'district', 'localBody', 'threeGenerationDetails', 'introboard', 'businessDetail.province', 'businessDetail.district', 'businessDetail.localBody', 'businessRegisteredFile', 'businessDetail.partnerDetails', 'businessDetail.registeredBusinesses');

        $printed_data = PrintedData::where('proprietor_detail_id', $id)
            ->latest()
            ->get();

        return view('businessregistration::admin.businessRegistration.show', compact('proprietorDetail', 'printed_data'));
    }

    public function editData($id, $type)
    {
        $proprietorDetail = ProprietorDetail::findOrFail($id);

        $printed_data = PrintedData::where(
            [
                'proprietor_detail_id' => $id,
                'for' => $type,
            ]
        )->latest()->first();

        return view('businessregistration::admin.businessRegistration.edit', compact('proprietorDetail', 'type', 'printed_data'));
    }

    public function storeData(StorePrintedDataRequest $request, $id, $type)
    {
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
}
