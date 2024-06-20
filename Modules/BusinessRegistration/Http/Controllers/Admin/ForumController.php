<?php

namespace Modules\BusinessRegistration\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OfficeHeader;
use App\Traits\NepaliDateConverter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\BusinessRegistration\Entities\Forum;
use Modules\BusinessRegistration\Entities\PrintedData;
use Modules\BusinessRegistration\Http\Requests\PrintedData\StorePrintedDataRequest;

class ForumController extends Controller
{
    use NepaliDateConverter;

    public function index()
    {
        $forums = Forum::with('partners', 'partners.localBody', 'localBody')->where(function (Builder $q) {
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

        return view('businessregistration::admin.forum.index', compact('forums'));
    }

    public function show(Forum $forum)
    {
        $forum->load(
            'partners.issueDistrict',
            'partners.district',
            'partners.localBody',
        );

        return view('businessregistration::admin.forum.show', compact('forum'));
    }

    public function customData(Request $request, Forum $forum)
    {

        $data = $request->validate([
            'bill_no' => ['required'],
            'bill_date_bs' => ['required'],
            'bill_date_ad' => ['required'],
            'other_file' => ['nullable', 'mimes:png,jpg,jpeg,pdf'],
            'amount' => ['required'],
            'taxpayer_number' => ['nullable'],
        ]);

        DB::transaction(function () use ($forum, $data) {
            if (empty($forum->registration_no)) {
                $reg_no = Forum::whereFiscalYearId(\officeSetting()->fiscal_year_id)
                    ->max('reg_no') + 1;
                $data = array_merge($data, [
                    'reg_no' => $reg_no,
                    'fiscal_year_id' => \officeSetting()->fiscal_year_id,
                    'registration_no' => 'FR-'.officeSetting()->fiscalYear->title.'-'.Str::padLeft($reg_no, 4, 0),
                    'registration_date_en' => today()->toDateString(),
                    'registration_date_ne' => $this->get_today_nepali_date(),
                ]);
            }

            $forum->update($data);
        });
        toast('दस्तुर सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function create()
    {

        return view('businessregistration::admin.forum.create');
    }
    public function edit(Forum $forum)
    {
        $forum->load('partners', 'files');

        return view('businessregistration::admin.forum.edit', compact('forum'));
    }

    public function storeData(StorePrintedDataRequest $request, Forum $forum, $type): RedirectResponse
    {
        DB::transaction(function () use ($request, $forum, $type) {
            $printed_data = PrintedData::updateOrCreate(
                [
                    'organization_registration_id' => $forum->id,
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

    public function printData(Forum $forum)
    {
        $officeHeaders = OfficeHeader::get();
        $forum->load(
            ['partners' => function ($query) {
                $query->with('issueDistrict', 'district', 'localBody', 'province');
            }, 'province', 'district', 'localBody']
        );
        $todayDateInBS = $this->get_today_nepali_date();

        return view('businessregistration::admin.forum.printData', compact('forum', 'officeHeaders', 'todayDateInBS'));
    }
}
