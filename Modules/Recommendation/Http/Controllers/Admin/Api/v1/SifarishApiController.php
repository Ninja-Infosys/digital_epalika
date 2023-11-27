<?php

namespace Modules\Recommendation\Http\Controllers\Admin\Api\v1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Recommendation\Http\Requests\SipharishCreated\StoreSipharisCreatedRequest;
use Illuminate\Support\Facades\DB;
use Modules\Recommendation\Entities\SipharishCreate;
use Modules\Recommendation\Transformers\SifarishFormResource;

class SifarishApiController extends Controller
{
    public function index()
    {
        $sipharishCreates = SipharishCreate::with('SipharishFormType', 'personalDetail')->where('status',1)->latest()->get();
        // return response()->json(['data' => $sipharishCreates], 200);
        return response()->json(['data' => new SifarishFormResource($sipharishCreates)], 200);
    }

    public function create()
    {
        return view('recommendation::create');
    }

    public function store(StoreSipharisCreatedRequest $request)
    {
        $sipharis = DB::transaction(function () use ($request) {
            $sipharis = SipharishCreate::create($request->validated() + [
                'created_by' => auth()->id()
            ]);

            if (
                array_key_exists('fields', $request->validated())
                && !empty($request->validated()['fields'])
            ) {

                foreach ($request->validated()['fields'] as $field) {
                    $sipharis->SipharishCreatedValues()->create($field);
                }
            }

            if (
                array_key_exists('files', $request->validated())
                && !empty($request->validated()['files'])
            ) {

                foreach ($request->validated()['files'] as $file) {
                    $sipharis->SipharisCreatedDocuments()->create($file + [
                        'extension' => $file['filename']->getClientOriginalExtension()
                    ]);
                }
            }


            return $sipharis;
        });

        // return response()->json($sipharis);
        return response()->json(['data' => new SifarishFormResource($sipharis)], 200);
    }

    public function show($id)
    {
        return view('recommendation::show');
    }

    public function edit($id)
    {
        return view('recommendation::edit');
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
