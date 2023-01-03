<?php

namespace Modules\JudicialCommittee\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\JudicialCommittee\Entities\ComplaintApplication;
use Modules\JudicialCommittee\Entities\WrittenAnswer;

class WrittenAnswerController extends Controller
{
    public function index(ComplaintApplication $complaintApplication)
    {
        $this->checkAuthorization('writtenAnswer_access');

        $complaintApplication->load('writtenAnswers');

        return view('judicialcommittee::admin.written_answer.index',compact('complaintApplication'));
    }

    public function create(ComplaintApplication $complaintApplication)
    {
        $this->checkAuthorization('writtenAnswer_create');

        return view('judicialcommittee::admin.written_answer.create',compact('complaintApplication'));
    }

    public function store(Request $request,ComplaintApplication $complaintApplication)
    {
        $this->checkAuthorization('writtenAnswer_create');
    }

    public function show(ComplaintApplication $complaintApplication,WrittenAnswer $writtenAnswer)
    {
        $this->checkAuthorization('writtenAnswer_access');

        return view('judicialcommittee::show');
    }

    public function edit(ComplaintApplication $complaintApplication,WrittenAnswer $writtenAnswer)
    {
        $this->checkAuthorization('writtenAnswer_edit');

        return view('judicialcommittee::edit');
    }

    public function update(Request $request, ComplaintApplication $complaintApplication,WrittenAnswer $writtenAnswer)
    {
        $this->checkAuthorization('writtenAnswer_edit');
    }

    public function destroy(ComplaintApplication $complaintApplication,WrittenAnswer $writtenAnswer)
    {
        $this->checkAuthorization('writtenAnswer_delete');
    }
}
