<?php

namespace Modules\Recommendation\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Recommendation\Entities\PersonalDetail;
use Modules\Recommendation\Entities\RecommendationCategory;
use Modules\Recommendation\Entities\RegistrationDetail;
use Modules\Recommendation\Http\Requests\Registration\StoreRegistrationRequest;
use Modules\Recommendation\Http\Requests\Registration\UpdateRegistrationRequest;

class RegistrationDetailController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('recommendation_access');
        $registrationDetails = RegistrationDetail::filterData()->with('recommendationCategory', 'personalDetail')->where(function (Builder $q) {
            if (!is_null(request('search'))) {
                $q->whereLike(['registration_no', 'date_ne'], request('search'));
            }
            if (!empty(request('recommendation_category'))) {
                $q->where('recommendation_category_id', request('recommendation_category'));
            }
            if (!empty(request('personal_detail'))) {
                $q->where('personal_detail_id', request('personal_detail'));
            }
            if (!empty(request('registration_no'))) {
                $q->where('registration_no', request('registration_no'));
            }
            if (!empty(request('to_date'))) {
                $q->whereDate('date_ne', '>=', request('to_date'));
            }
            if (!empty(request('from_date'))) {
                $q->whereDate('date_ne', '<=', request('from_date'));
            }
        })->latest()
            ->paginate(15);
        $personalDetails = PersonalDetail::all();
        $recommendationCategories = RecommendationCategory::with('recommendationCategories')->whereNull('recommendation_category_id')->get();

        return view('recommendation::admin.registration.index', compact('recommendationCategories', 'personalDetails', 'registrationDetails'));
    }

    public function create()
    {
        $this->checkAuthorization('recommendation_create');
        $recommendationCategories = RecommendationCategory::with('recommendationCategories')->whereNull('recommendation_category_id')->get();
        $personalDetails = PersonalDetail::all();
        return view('recommendation::admin.registration.create', compact('recommendationCategories', 'personalDetails'));
    }

    public function store(StoreRegistrationRequest $request)
    {
        $this->checkAuthorization('recommendation_create');
        DB::transaction(function () use ($request) {
            $registrationDetail = RegistrationDetail::create($request->validated() + [
                    'fiscal_year_id' => officeSetting()->fiscal_year_id,
                    'ward_no' => auth()->user()->role->type === 'Super' ? $request->input('ward_no') : auth()->user()->ward_no
                ]);
            $this->getClientFile($request, $registrationDetail);
        });
        toast('दर्ता सफलतापूर्वक गरियो', 'success');
        return redirect()->route('admin.recommendation.registrationDetail.index');
    }

    public function show(RegistrationDetail $registrationDetail)
    {
        $this->checkAuthorization('recommendation_access');
        $registrationDetail->load('personalDetail', 'files', 'recommendationCategory');
        return view('recommendation::admin.registration.show', compact('registrationDetail'));
    }

    public function edit(RegistrationDetail $registrationDetail)
    {
        $this->checkAuthorization('recommendation_edit');
        $recommendationCategories = RecommendationCategory::with('recommendationCategories')->whereNull('recommendation_category_id')->get();
        $personalDetails = PersonalDetail::all();
        return view('recommendation::admin.registration.edit', compact('registrationDetail', 'recommendationCategories', 'personalDetails'));
    }

    public function update(UpdateRegistrationRequest $request, RegistrationDetail $registrationDetail)
    {
        $this->checkAuthorization('recommendation_edit');
        DB::transaction(function () use ($request,$registrationDetail){
            $registrationDetail->update($request->validated());
            $this->getClientFile($request, $registrationDetail);
        });

        toast('सिफारिस विवरण सफलतापूर्वक गरियो', 'success');
        return redirect()->route('admin.recommendation.registrationDetail.index');
    }

    public function destroy(RegistrationDetail $registrationDetail)
    {
        $this->checkAuthorization('recommendation_delete');
        $registrationDetail->delete();
        toast('सिफारिस सफलतापूर्वक मेटियो', 'success');
        return back();
    }

    public function ocFile(Request $request, RegistrationDetail $registrationDetail)
    {
        $request->validate([
            'oc_file' => ['array', 'required'],
            'oc_file.*' => ['mimes:png,jpg,jpeg,pdf']
        ]);
        DB::transaction(function () use ($request, $registrationDetail) {
            if ($request->hasFile('oc_file')) {
                foreach ($request->file('oc_file') as $file) {
                    $file_data = $file->store('oc_file', 'public');
                    $registrationDetail->files()->create([
                        'file' => $file_data,
                        'file_name' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
                        'extension' => $file->getClientOriginalExtension(),
                        'type' => 'OcFile'
                    ]);
                }
            }
        });
        toast('सिफारिस फाईल सफलतापूर्वक थपियो', 'success');
        return back();
    }


   private function getClientFile($request, RegistrationDetail $registrationDetail)
    {
        if ($request->input('files')) {
            foreach ($request->validated()['files'] as $file) {
                $data = $file['file']->store('recommendation_file/' . Str::slug($request->input('date_ne')), 'public');
                $registrationDetail->files()->create([
                    'file_name' => $file['file_name'],
                    'file' => $data,
                    'extension' => $file['file']->getClientOriginalExtension(),
                    'type' => 'ClientFile'
                ]);
            }
        }
    }

}
