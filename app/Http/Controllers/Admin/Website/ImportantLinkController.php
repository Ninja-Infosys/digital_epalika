<?php

namespace App\Http\Controllers\Admin\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\ImportantLink\StoreImportantLinkRequest;
use App\Http\Requests\Website\ImportantLink\UpdateImportantLinkRequest;
use App\Models\Website\ImportantLink;
use Illuminate\Support\Facades\Gate;

class ImportantLinkController extends Controller
{
    public function index()
    {
        abort_if(
            Gate::denies('importantLink_access'),
            403,
            'You are not allowed to access this resource'
        );
        $importantLinks = ImportantLink::all();

        return view('admin.website.important_link.index', compact('importantLinks'));
    }

    public function create()
    {

        abort_if(
            Gate::denies('importantLink_create'),
            403,
            'You are not allowed to access this resource'
        );
        return view('admin.website.important_link.create');
    }

    public function store(StoreImportantLinkRequest $request)
    {

        abort_if(
            Gate::denies('importantLink_create'),
            403,
            'You are not allowed to access this resource'
        );
        ImportantLink::create($request->validated());

        toast('महत्त्वपूर्ण लिङ्क सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function show(ImportantLink $importantLink)
    {
        //
    }

    public function edit(ImportantLink $importantLink)
    {

        abort_if(
            Gate::denies('importantLink_edit'),
            403,
            'You are not allowed to access this resource'
        );
        return view('admin.website.important_link.edit', compact('importantLink'));
    }

    public function update(UpdateImportantLinkRequest $request, ImportantLink $importantLink)
    {

        abort_if(
            Gate::denies('importantLink_edit'),
            403,
            'You are not allowed to access this resource'
        );
        $importantLink->update($request->validated());

        toast('महत्त्वपूर्ण लिङ्क सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.website.importantLink.index'));
    }

    public function destroy(ImportantLink $importantLink)
    {

        abort_if(
            Gate::denies('importantLink_delete'),
            403,
            'You are not allowed to access this resource'
        );
        $importantLink->delete();

        toast('महत्त्वपूर्ण लिङ्क सफलतापूर्वक मेटियो', 'success');

        return back();
    }
}
