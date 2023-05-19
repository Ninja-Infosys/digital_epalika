<?php

namespace Modules\Circular\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Circular\Entities\Dispatch;
use Modules\Circular\Entities\DispatchDetail;

class DispatchDetailController extends Controller
{
    public function index()
    {
        return view('circular::index');
    }

    public function create()
    {
        return view('circular::create');
    }

    public function store(Request $request, Dispatch $dispatch)
    {
        $data = $request->validate([
            'remarks' => ['required'],
            'files' => ['nullable', 'array'],
            'files.*' => ['file']
        ]);
        DB::transaction(function () use ($data, $dispatch, $request) {
            $dispatchDetail = DispatchDetail::updateOrCreate([
                'dispatch_id' => $dispatch->id,
            ],$data);
            foreach ($request->file('files') ?? [] as $file) {
                $dispatchDetail->files()->create([
                    'file_name' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
                    'extension' => $file->getClientOriginalExtension(),
                    'file' => $file->store('dispatchDetail', 'public')
                ]);
            }
        });
        toast('चलानी सफलतापूर्वक थपियो', 'success');
        return back();


    }

    public function show($id)
    {
        return view('circular::show');
    }

    public function edit($id)
    {
        return view('circular::edit');
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
