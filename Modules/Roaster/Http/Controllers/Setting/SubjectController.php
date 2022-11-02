<?php

namespace Modules\Roaster\Http\Controllers\Setting;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Roaster\Entities\Subject;
use Modules\Roaster\Http\Requests\Settings\Subject\StoreSubjectRequest;
use Modules\Roaster\Http\Requests\Settings\Subject\UpdateSubjectRequest;
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

        return view('roaster::index');
    }

    public function create()
    {

        abort_if(
            Gate::denies('subject_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        return view('roaster::create');
    }

    public function store(StoreSubjectRequest $request)
    {
        abort_if(
            Gate::denies('subject_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
    }

    public function show(Subject $subject)
    {

        abort_if(
            Gate::denies('subject_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        return view('roaster::show');
    }

    public function edit(Subject $subject)
    {
        abort_if(
            Gate::denies('subject_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        return view('roaster::edit');
    }

    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        abort_if(
            Gate::denies('subject_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
    }

    public function destroy(Subject $subject)
    {
        abort_if(
            Gate::denies('subject_delete'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
    }
}
