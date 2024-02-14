<?php

namespace Modules\Recommendation\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Recommendation\Entities\RevenueHeader;
use Modules\Recommendation\Http\Requests\RevenueHeader\StoreRevenueHeaderRequest;
use Modules\Recommendation\Http\Requests\RevenueHeader\UpdateRevenueHeaderRequest;

class RevenueHeaderController extends Controller
{
    public function index()
    {
        $revenueHeaders = RevenueHeader::all();
        return view('recommendation::admin.recommendation.setting.revenue-header.index',compact('revenueHeaders'));
    }

    public function create()
    {
        return view('recommendation::admin.recommendation.setting.revenue-header.create');
    }

    public function store(StoreRevenueHeaderRequest $request)
    {
        RevenueHeader::create($request->validated());
        toast('राजस्व सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(RevenueHeader $revenueHeader)
    {
        return view('recommendation::show');
    }

    public function edit(RevenueHeader $revenueHeader)
    {
        return view('recommendation::admin.recommendation.setting.revenue-header.edit',compact('revenueHeader'));
    }

    public function update(UpdateRevenueHeaderRequest $request, RevenueHeader $revenueHeader)
    {
        $revenueHeader->update($request->validated());
        toast('राजस्व सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.recommendation.setting.revenueHeader.index'));
    }

    public function destroy(RevenueHeader $revenueHeader)
    {
        $revenueHeader->delete();
        toast('राजस्व सफलतापूर्वक मेटियो', 'success');
        return back();
    }
}
