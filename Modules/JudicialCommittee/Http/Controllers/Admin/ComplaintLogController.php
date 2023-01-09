<?php

namespace Modules\JudicialCommittee\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\JudicialCommittee\Entities\ComplaintApplication;
use Modules\JudicialCommittee\Entities\ComplaintLog;

class ComplaintLogController extends Controller
{
    public function index(ComplaintApplication $complaintApplication)
    {
        $complaintApplication->load('complaintLogs');

        return view('judicialcommittee::admin.complaint_log.index',compact('complaintApplication'));
    }
}
