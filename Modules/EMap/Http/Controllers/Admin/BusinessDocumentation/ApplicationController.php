<?php

namespace Modules\EMap\Http\Controllers\Admin\BusinessDocumentation;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\NepaliDateConverter;
use Carbon\Carbon;
use Modules\EMap\Entities\BuildingDocumentation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ApplicationController extends Controller
{
    use NepaliDateConverter;
    public function index(BuildingDocumentation $application)
    {

        // return today();
        $applications = BuildingDocumentation::with('requiredDocument', 'neighbours', 'localBody')->where(function (Builder $q) {
            if (!is_null(request('search'))) {
                $q->whereLike(['house_owner_name', 'submission_no', 'registration_no'], request('search'));
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


        return view('emap::admin.buildingDocumentation.application.index', compact('applications'));
    }

    public function edit(BuildingDocumentation $application)
    {
        $application->load('neighbours', 'files', 'requiredDocument');

        return view('emap::admin.buildingDocumentation.application.edit', compact('application'));
    }

    public function show(BuildingDocumentation $application)
    {
        $application->load(
            'neighbours',
            'requiredDocument',
            'files'

        );

        return view('emap::admin.buildingDocumentation.application.show', compact('application'));
    }
    public function customData(Request $request, BuildingDocumentation $application)
    {

        $data = $request->validate([
            'bill_no' => ['required'],
            'bill_date_bs' => ['required'],
            'bill_date_ad' => ['required'],
            'other_file' => ['nullable', 'mimes:png,jpg,jpeg,pdf'],
            'amount' => ['required'],
            'taxpayer_number' => ['nullable'],
        ]);

        DB::transaction(function () use ($application, $data) {
            if (empty($application->registration_no)) {
                $reg_no = BuildingDocumentation::whereFiscalYearId(\officeSetting()->fiscal_year_id)
                        ->max('reg_no') + 1;
                $data = array_merge($data, [
                    'reg_no' => $reg_no,
                    'fiscal_year_id' => \officeSetting()->fiscal_year_id,
                    'registration_no' => 'FR-'.officeSetting()->fiscalYear->title.'-'.Str::padLeft($reg_no, 4, 0),
                    'registration_date_en' => today()->toDateString(),
                    'registration_date_ne' => $this->get_today_nepali_date(),
                ]);
            }

            $application->update($data);
        });
        toast('दस्तुर सफलतापूर्वक थपियो', 'success');
        return redirect()->route('emap.admin.application.printNotice', $application->id);


    }

    public function printNotice(BuildingDocumentation $application)
    {
        $application->load([
            'neighbours'
        ]);
        return view('emap::admin.buildingDocumentation.template.notice', compact('application'));
    }


    public function printLandConfirmation(BuildingDocumentation $application)
    {

        $application->load([
            'neighbours'
        ]);
        return view('emap::admin.buildingDocumentation.template.landConfirmation', compact('application'));
    }
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
