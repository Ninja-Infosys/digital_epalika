<?php

namespace App\Http\Controllers\Admin\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\ImportantLink\StoreImportantLinkRequest;
use App\Http\Requests\Website\ImportantLink\UpdateImportantLinkRequest;
use App\Models\Website\ImportantLink;

class ImportantLinkController extends Controller
{
    public function index()
    {
        $importantLinks = ImportantLink::all();

        return view('admin.website.important_link.index', compact('importantLinks'));
    }

    public function create()
    {
        return view('admin.website.important_link.create');
    }

    public function store(StoreImportantLinkRequest $request)
    {
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
        return view('admin.website.important_link.edit', compact('importantLink'));
    }

    public function update(UpdateImportantLinkRequest $request, ImportantLink $importantLink)
    {
        $importantLink->update($request->validated());

        toast('महत्त्वपूर्ण लिङ्क सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.website.importantLink.index'));
    }

    public function destroy(ImportantLink $importantLink)
    {
        $importantLink->delete();

        toast('महत्त्वपूर्ण लिङ्क सफलतापूर्वक मेटियो', 'success');

        return back();
    }
}
