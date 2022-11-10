<?php

namespace Modules\EMap\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\EMap\Entities\MapApply;

class FrontendController extends Controller
{
    public function eMap()
    {
        return view('emap::frontend.e-map.index');
    }

    public function downloads()
    {
        return view('emap::frontend.e-map.downloads.downloads');
    }

    public function eHelp()
    {
        return view('emap::frontend.e-map.e-help.e-help');
    }

    public function form()
    {
        return view('emap::frontend.e-map.form.form');
    }

    public function register()
    {
        return view('emap::frontend.e-map.register.register-form');
    }

    public function mapTrack()
    {
        return view('emap::frontend.e-map.map_track.map_track');
    }

    public function formDetails()
    {
        return view('emap::frontend.e-map.map_track.form_details');
    }

    public function mapForm()
    {
        return view('emap::frontend.e-map.map_track.form');
    }

    public function track_Map(Request $request)
    {
        $request->validate([
            'submission_no' => ['required', 'exists:map_applies,unique_id'],
            'phone_no' => ['required']
        ]);

        $mapApply = MapApply::whereHas('houseOwner', function ($query) use ($request) {
            $query->where('phone', $request->input('phone_no'));
        })
            ->where('unique_id', $request->input('submission_no'))
            ->first();
        if ($mapApply) {
            return redirect(route('track-data', $mapApply));
        }

        return back()->with('message', 'Record does not match !!!!');


    }

    public function trackData(MapApply $mapApply)
    {
        $mapApply->load('applyMapNotices');
        return view('emap::frontend.e-map.map_track.form_details', compact('mapApply'));
    }
}
