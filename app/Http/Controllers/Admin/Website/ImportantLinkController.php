<?php

namespace App\Http\Controllers\Admin\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\ImportantLink\StoreImportantLinkRequest;
use App\Http\Requests\Website\ImportantLink\UpdateImportantLinkRequest;
use App\Models\Website\ImportantLink;
use Illuminate\Http\Request;

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

        toast('Import Link Added Successfully', 'success');
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

        toast('Important Link Updated Successfully', 'success');

        return redirect(route('admin.website.importantLink.index'));
    }

    public function destroy(ImportantLink $importantLink)
    {
        $importantLink->delete();

        toast('Important Link Deleted Successfully', 'success');
        return back();
    }
}
