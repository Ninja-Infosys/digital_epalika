<?php

namespace Modules\JudicialCommittee\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\JudicialCommittee\Entities\ComplaintApplication;

class ComplaintApplicationController extends Controller
{
    public function index()
    {
        $complaintApplications=ComplaintApplication::orderByDesc('date')->get();

        return view('judicialcommittee::admin.complaint_application.index',compact('complaintApplications'));
    }

    public function create()
    {
        return view('judicialcommittee::admin.complaint_application.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('judicialcommittee::show');
    }

    public function edit($id)
    {
        return view('judicialcommittee::edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
