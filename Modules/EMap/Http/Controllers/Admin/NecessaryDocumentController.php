<?php

namespace Modules\EMap\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\EMap\Entities\NecessaryDocument;
use Modules\EMap\Http\Requests\NecessaryDocument\StoreNecessaryDocumentRequest;
use Modules\EMap\Http\Requests\NecessaryDocument\UpdateNecessaryDocumentRequest;
use Illuminate\Support\Str;

class NecessaryDocumentController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('necessaryDocument_access');

        $necessaryDocuments = NecessaryDocument::latest()->paginate(10);
        return view('emap::admin.necessaryDocument.index', compact('necessaryDocuments'));
    }

    public function create()
    {
        $this->checkAuthorization('necessaryDocument_create');

        return view('emap::admin.necessaryDocument.create');
    }

    public function store(StoreNecessaryDocumentRequest $request)
    {
        $this->checkAuthorization('necessaryDocument_create');
        $neccessaryDocument = NecessaryDocument::create($request->validated());
        if ($request->hasFile('files')) {
            $this->fileUpload($neccessaryDocument, $request);
        }
        toast('आवश्यक कागजातहरू थपियो', 'success');
        return back();
    }

    public function show(NecessaryDocument $necessaryDocument)
    {
        $this->checkAuthorization('necessaryDocument_create');
        $necessaryDocument->load('files');
        // dd($necessaryDocument);
        return view('emap::admin.necessaryDocument.show', compact('necessaryDocument'));
    }

    public function edit(NecessaryDocument $necessaryDocument)
    {
        $this->checkAuthorization('necessaryDocument_edit');
        return view('emap::admin.necessaryDocument.edit', compact('necessaryDocument'));
    }

    public function update(UpdateNecessaryDocumentRequest $request, NecessaryDocument $necessaryDocument)
    {
        $this->checkAuthorization('necessaryDocument_edit');

        $necessaryDocument->update($request->validated());
        toast('आवश्यक कागजातहरू सफलतापूर्वक', 'sucsess');
        return redirect(route('emap.admin.necessaryDocument.index'));
    }

    public function destroy(NecessaryDocument $necessaryDocument)
    {
        $this->checkAuthorization('necessaryDocument_delete');
        $necessaryDocument->delete();
        toast('आवश्यक कागजातहरू सफलतापूर्वक मेटाइयो', 'success');
        return back();
    }

    public function fileUpload($neccessaryDocument, $request): void
    {
        foreach ($request->file('files') as $file) {
            $extension = $file->getClientOriginalExtension();
            $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $neccessaryDocument->files()->create([
                'file_name' => $name,
                'extension' => $extension,
                'file' => $file->store('neccessaryDocument/' . Str::slug($request->input('title'), '_'), 'public'),
            ]);
        }
    }
}
