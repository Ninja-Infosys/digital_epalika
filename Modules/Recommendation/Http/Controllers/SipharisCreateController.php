<?php

namespace Modules\Recommendation\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Recommendation\Entities\SipharishCreate;
use Modules\Recommendation\Http\Requests\SipharishCreated\StoreSipharisCreatedRequest;
use Illuminate\Support\Facades\DB;

class SipharisCreateController extends Controller
{

    public function index()
    {
        $this->checkAuthorization('recommendationCategory_access');
        $sipharishCreates = SipharishCreate::with('SipharishFormType','personalDetail')->latest()->get();
        return view('recommendation::admin.sipharisCreate.index', compact('sipharishCreates'));
    }

    public function create()
    {
        return view('recommendation::admin.sipharisCreate.create');
    }

    public function store(StoreSipharisCreatedRequest $request)
    {
//        dd($request->validated());
        DB::transaction(function () use ($request) {
            $sipharis = SipharishCreate::create($request->validated() + [
                    'created_by' => auth()->id()
                ]);

            if (array_key_exists('fields', $request->validated())
                && !empty($request->validated()['fields'])) {

                foreach ($request->validated()['fields'] as $field) {
                    $sipharis->SipharishCreatedValues()->create($field);
                }

            }

            if (array_key_exists('files', $request->validated())
                && !empty($request->validated()['files'])) {

                foreach ($request->validated()['files'] as $file) {
                    $sipharis->SipharisCreatedDocuments()->create($file + [
                            'extension' => $file['filename']->getClientOriginalExtension()
                        ]);
                }

            }
        });

        toast('सिफारिस सफलतापूर्वक थपियो', 'success');
        return back();


    }

    public function edit(SipharishCreate $sipharishCreate)
    {
        return view('recommendation::admin.sipharisCreate.edit', compact('sipharishCreate'));
    }

    public function show(SipharishCreate $sipharishCreate)
    {

        $sipharishCreate->load('SipharishCreatedValues.SipharisFormFields','SipharisCreatedDocuments');
        return view('recommendation::admin.sipharisCreate.view', compact('sipharishCreate'));

    }

    public function updateStatus(SipharishCreate $sipharishCreate)
    {
        $this->checkAuthorization('recommendationTemplate_access');

        $sipharishCreate->update([
            'status' => !$sipharishCreate->status
        ]);
        toast('टेम्प्लेट स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }

    public function destroy(SipharishCreate $sipharishCreate)
    {
        $this->checkAuthorization('recommendationCategory_delete');
        if ($sipharishCreate->status == 1) {
            toast('सक्रिय भएको सिफारिस प्रकार मेटाउन मनाहि छ', 'error');

            return back();
        }
        $sipharishCreate->delete();
        toast('सिफारिस सफलतापूर्वक मेटियो', 'success');
        return back();
    }
}
