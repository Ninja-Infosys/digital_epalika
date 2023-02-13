<?php

namespace Modules\Recommendation\Http\Controllers\admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Recommendation\Entities\PersonalDetail;
use Modules\Recommendation\Http\Requests\PersonalDetail\StorePersonalDetailRequest;
use Modules\Recommendation\Http\Requests\PersonalDetail\UpdatePersonalDetailRequest;

class PersonalDetailController extends Controller
{
    public function index()
    {
        $personaldetails = PersonalDetail::all();
        return view('recommendation::admin.setting.personalDetail.index', compact('personaldetails'));
    }

    public function create()
    {
        return view('recommendation::admin.setting.personalDetail.create');
    }

    public function store(StorePersonalDetailRequest $request)
    {

        $personalDetail = PersonalDetail::create($request->validated());

        if ($request->ajax()) {
            return response()->json([
                'data' => [
                    'personal_detail_id' => $personalDetail->id,
                    'name' => $personalDetail->name,
                    'reg_no' => $personalDetail->reg_no,
                ],
                'message' => 'कृषक सफलता पुर्वक थपियो !'
            ]);
        }
        toast('व्यक्तिगत विवरण सफलतापूर्वक थपियो', 'success');
        return redirect()->route('admin.recommendation.setting.personalDetail.index');
    }

    public function show(PersonalDetail $personalDetail)
    {
        $personalDetail->load('province','district','localBody');
        return view('recommendation::admin.setting.personalDetail.show', compact('personalDetail'));
    }

    public function edit(PersonalDetail $personalDetail)
    {
        return view('recommendation::admin.setting.personalDetail.edit', compact('personalDetail'));
    }

    public function update(UpdatePersonalDetailRequest $request, PersonalDetail $personalDetail)
    {
        $personalDetail->update($request->validated());
        toast('व्यक्तिगत विवरण सफलतापूर्वक गरियो', 'success');
        return back();
    }

    public function destroy(PersonalDetail $personalDetail)
    {
        $personalDetail->delete();
        toast('व्यक्तिगत विवरण सफलतापूर्वक मेटियो', 'success');
        return back();
    }
}
