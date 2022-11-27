<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        $files = File::whereNull('model_type')->get();

        return view('admin.files.index', compact('files'));
    }

    public function show(File $file): JsonResponse
    {
        return response()->json([
            'fileName' => $file->file_name,
            'uploaded' => true,
            'url' => $file->file_url,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        if ($request->hasFile('upload')) {
            $file = File::create([
                'file_name' => pathinfo($request->file('upload')?->getClientOriginalName(), PATHINFO_FILENAME),
                'extension' => $request->file('upload')?->getClientOriginalExtension(),
                'file' => $request->file('upload')?->store('editor/file', 'public'),
            ]);

            return response()->json([
                'fileName' => $file->file_name,
                'uploaded' => true,
                'url' => $file->file_url,
            ]);
        }

        return response()->json([
            'uploaded' => false,
        ]);
    }

    public function storeInStorage(Request $request): JsonResponse
    {
        $request->validate([
            'upload' => ['required']
        ]);
        if ($request->hasFile('upload')) {
            $file_name = pathinfo($request->file('upload')?->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $request->file('upload')?->getClientOriginalExtension();
            $file = $request->file('upload')?->store('recommendation/', 'public');

            return response()->json([
                'fileName' => $file_name,
                'uploaded' => true,
                'url' => $file,
                'extension' => $extension,
            ]);
        }

        return response()->json([
            'uploaded' => false,
        ]);
    }

    public function destroy(File $file)
    {
        if ($file->file) {
            $this->deleteFile($file->file);
        }
        toast('फाइल सफलतापूर्वक मेटियो', 'success');
        $file->delete();

        return back();
    }
}
