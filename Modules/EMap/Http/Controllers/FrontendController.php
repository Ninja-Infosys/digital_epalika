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
            'submission_no' => ['required'],
            'phone_no' => ['required']
        ]);
       $mapApplay =  MapApply::whereHas('houseOwner', function ($query) use ($request) {
            $query->where('phone', $request->input('phone'));
        });
    }
}
