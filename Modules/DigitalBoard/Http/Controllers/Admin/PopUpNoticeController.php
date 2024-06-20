<?php

namespace Modules\DigitalBoard\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\DigitalBoard\Entities\PopUpNotice;
use Modules\DigitalBoard\Http\Requests\PopUpNotice\StorePopUpNoticeRequest;
use Modules\DigitalBoard\Http\Requests\PopUpNotice\UpdatePopUpNotice;

class PopUpNoticeController extends Controller
{
    public function index()
    {

        $popUpNotices = PopUpNotice::WithWhereHas('popupActivations', function ($q) {
            if (!empty(auth()->user()->ward_no)) {
                $authWardNo = auth()->user()->ward_no;
                $q->whereRaw("FIND_IN_SET('$authWardNo', ward) > 0");
            }
        })
            ->get();

        return view('digitalboard::admin.popUpNotice.index', compact('popUpNotices'));
    }
    public function create( PopUpNotice $popUpNotice)
    {
        return view('digitalboard::admin.popUpNotice.create',compact('popUpNotice'));
    }

    // public function store(StorePopUpNoticeRequest $request)
    // {
    //     $popUpNotice = PopUpNotice::where(function ($q) {
    //         if (!empty(auth()->user()->ward_no)) {
    //             $q->where('ward', auth()->user()->ward_no);
    //         } else {
    //             $q->whereNull('ward');
    //         }
    //     })
    //         ->get();

    //     if (!empty($popUpNotice)) {
    //         if ($request->hasFile('image') && $popUpNotice->image) {
    //             $this->deleteFile($popUpNotice->image);
    //         }


    //     }
    //         PopUpNotice::create($request->validated() + ['ward' => auth()->user()->ward_no]);

    //     toast('पपअप सफलतापूर्वक अद्यावधिक गरियो', 'success');

    //     return redirect(route('admin.digitalBoard.popUpNotice.index'));
    // }

    public function store(StorePopUpNoticeRequest $request)
    {
        DB::transaction(function () use ($request) {
            $popUpNotice = PopUpNotice::create($request->validated() + ['user_id' => auth()->id()]);
            if (!empty($request->input('ward'))) {
                foreach ($request->input('ward') as $ward) {
                    $popUpNotice->popupActivations()->create([
                        'is_active' => 1,
                        'ward' => $ward
                    ]);
                }
            } else {
                $popUpNotice->popupActivations()->create([
                    'is_active' => 1,
                    'ward' => auth()->user()->ward_no
                ]);
            }
        });


        toast('PopUp सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return back();
    }
    public function edit(PopUpNotice $popUpNotice)
    {
        return view('digitalboard::admin.popUpNotice.edit',compact('popUpNotice'));
    }
    public function update(UpdatePopUpNotice $request, PopUpNotice $popUpNotice)
    {
        $popUpNotice->update($request->validated());
        toast('पपअप सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.digitalBoard.popUpNotice.index'));
    }
    public function updateStatus(PopUpNotice $popUpNotice)
    {

        if (empty(auth()->user()->ward_no) || auth()->id() == $popUpNotice->user_id) {
            $popUpNotice->update([
                'is_active' => !$popUpNotice->is_active
            ]);
            toast('PopUp स्थिति अपडेट गरियो', 'success');
            return back();
        } else {
            toast('PopUp स्थिति अपडेट गरने अनुमाति छैन', 'error');
            return back();
        }
    }
    public function destroy(PopUpNotice $popUpNotice)
    {
        $popUpNotice->delete();
        toast('PopUp सफलतापूर्वक मेटियो', 'success');
        return back();
    }
}
