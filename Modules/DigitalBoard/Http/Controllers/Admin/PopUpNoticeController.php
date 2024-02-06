<?php

namespace Modules\DigitalBoard\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\DigitalBoard\Entities\PopUpNotice;
use Modules\DigitalBoard\Http\Requests\PopUpNotice\StorePopUpNoticeRequest;

class PopUpNoticeController extends Controller
{
    public function index()
    {
        $popUpNotice = PopUpNotice::where(function ($q) {
            if (!empty(auth()->user()->ward_no)) {
                $q->where('ward', auth()->user()->ward_no);
            } else {
                $q->whereNull('ward');
            }
        })
            ->first();

        return view('digitalboard::admin.popUpNotice.index', compact('popUpNotice'));
    }

    public function store(StorePopUpNoticeRequest $request)
    {
        $popUpNotice = PopUpNotice::where(function ($q) {
            if (!empty(auth()->user()->ward_no)) {
                $q->where('ward', auth()->user()->ward_no);
            } else {
                $q->whereNull('ward');
            }
        })
            ->first();

        if (!empty($popUpNotice)) {
            if ($request->hasFile('image') && $popUpNotice->image) {
                $this->deleteFile($popUpNotice->image);
            }

            $popUpNotice->update($request->validated());
        } else {
            PopUpNotice::create($request->validated() + ['ward' => auth()->user()->ward_no]);
        }
        toast('पपअप सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return back();
    }

    public function updateStatus($id)
    {
        $popUpNotice = PopUpNotice::findOrFail($id);
        $popUpNotice->update([
            'is_active' => !$popUpNotice->is_active
        ]);
        toast('पपअप सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return back();
    }
}
