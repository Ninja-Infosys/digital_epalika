<?php

namespace Modules\Plan\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Plan\Entities\PlanTemplate;
use Modules\Plan\Entities\Project;
use Modules\Plan\Entities\ProjectDocument;
use Modules\Plan\Http\Requests\ProjectDocument\StoreProjectDocumentRequest;
use Modules\Plan\Http\Requests\ProjectDocument\UpdateProjectDocumentRequest;

class ProjectDocumentController extends Controller
{
    public function index(Project $project)
    {
        $this->checkAuthorization('projectDocument_access');

        $project->load('projectDocuments');

        return view('plan::admin.project_document.index',compact('project'));
    }

    public function create(Project $project)
    {
        $this->checkAuthorization('projectDocument_create');

        $planTemplates = PlanTemplate::whereNull('type')->get();

        return view('plan::admin.project_document.create', compact('project', 'planTemplates'));
    }

    public function store(StoreProjectDocumentRequest $request, Project $project)
    {
        $this->checkAuthorization('projectDocument_create');

        $project->projectDocuments()->create($request->validated());

        toast('कागजात सफलतापूर्वक थपियो', 'success');
        return redirect(route('admin.plan.project.projectDocument.index', $project));
    }

    public function edit(Project $project, ProjectDocument $projectDocument)
    {
        $this->checkAuthorization('projectDocument_edit');

        return view('plan::admin.project_document.edit', compact('project', 'projectDocument'));
    }

    public function update(UpdateProjectDocumentRequest $request, Project $project, ProjectDocument $projectDocument)
    {
        $this->checkAuthorization('projectDocument_edit');

        $projectDocument->update($request->validated());

        toast('कागजात सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.plan.project.projectDocument.index', $project));
    }

    public function destroy(Project $project, ProjectDocument $projectDocument)
    {
        $this->checkAuthorization('projectDocument_delete');

        $projectDocument->delete();

        toast('कागजात सफलतापूर्वक मेटाइयो', 'success');
        return back();
    }
}
