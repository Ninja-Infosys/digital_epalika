<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Requests\Admin\Settings\Subject\StoreSubjectRequest;
use App\Http\Requests\Admin\Settings\Subject\UpdateSubjectRequest;
use App\Models\Settings\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class SubjectController extends Controller
{
    public function index()
    {
        abort_if(
            Gate::denies('subject_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $subjects = Subject::latest()->get();

        return view('backend.pages.settings.subject.index', compact('subjects'));
    }

    public function create()
    {
        abort_if(
            Gate::denies('subject_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        return view('backend.pages.settings.subject.create');
    }

    public function store(StoreSubjectRequest $request)
    {
        abort_if(
            Gate::denies('subject_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        Subject::create($request->validated());

        toast('Subject Created Successfully', 'success');
        return redirect(route('admin.settings.subject.index'));
    }

    public function edit(Subject $subject)
    {
        abort_if(
            Gate::denies('subject_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        return view('backend.pages.settings.subject.edit', compact('subject'));
    }

    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        abort_if(
            Gate::denies('subject_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $subject->update($request->validated());
        toast('Subject Updated Successfully', 'success');
        return redirect(route('admin.settings.subject.index'));
    }

    public function destroy(Subject $subject)
    {
        abort_if(
            Gate::denies('subject_delete'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $subject->delete();
        toast('Subject Deleted Successfully', 'success');
        return redirect(route('admin.settings.subject.index'));
    }
}
