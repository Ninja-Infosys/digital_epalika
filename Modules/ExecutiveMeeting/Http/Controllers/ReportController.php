<?php

namespace Modules\ExecutiveMeeting\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\ExecutiveMeeting\Entities\Meeting;

class ReportController extends Controller
{
    public function index()
    {
        return view('executivemeeting::admin.report.index');
    }

}
