<?php

namespace Modules\EMap\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    public function track()
    {
        return view('emap::frontend.e-map.track.track');
    }
}
