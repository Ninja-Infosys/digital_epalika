<?php

namespace Modules\JudicialCommittee\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\JudicialCommittee\Entities\LawsuitNature;
use Modules\JudicialCommittee\Http\Requests\LawSuiteNature\StoreLawSuiteNatureRequest;
use Modules\JudicialCommittee\Http\Requests\LawSuiteNature\updateLawSuiteNatureRequest;

class LawsuitNatureController extends Controller
{
    public function index()
    {
        $lawSuitNatures=LawsuitNature::latest()->get();
        return view('judicialcommittee::admin.setting.lawsuit_nature.index', compact('lawSuitNatures'));
    }

    public function create()
    {
        return view('judicialcommittee::admin.setting.lawsuit_nature.create');
    }

    public function store(StoreLawSuiteNatureRequest $request)
    {
        LawsuitNature::create($request->validated());

        toast('मुद्दा प्रकृति सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show($id)
    {
        return view('judicialcommittee::show');
    }

    public function edit(LawsuitNature $lawsuitNature)
    {
        return view('judicialcommittee::admin.setting.lawsuit_nature.edit', compact('lawsuitNature'));
    }

    public function update(updateLawSuiteNatureRequest $request, LawsuitNature $lawsuitNature)
    {
        $lawsuitNature->update($request->validated());

        toast('मुद्दा प्रकृति सफलतापूर्वक अपडेट गरियो','success');
        return redirect(route('admin.judicialCommittee.lawsuitNature.index'));
    }

    public function destroy(LawsuitNature $lawsuitNature)
    {
        $lawsuitNature->delete();

        toast('मुद्दा प्रकृति सफलतापूर्वक हटाइयो','success');
        return back();
    }
}
