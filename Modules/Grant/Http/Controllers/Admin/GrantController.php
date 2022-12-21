<?php

namespace Modules\Grant\Http\Controllers\Admin;

use App\Models\Settings\FiscalYear;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Grant\Entities\Grant;
use Modules\Grant\Entities\GrantOffice;
use Modules\Grant\Entities\GrantProgram;
use Modules\Grant\Entities\GrantType;
use Modules\Grant\Http\Requests\Grant\StoreGrantRequest;
use Modules\HelpDesk\Entities\Branch;

class GrantController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('grant_access');

        $grants = Grant::with('fiscalYear','grantType','branch', 'grantProgram', 'grantOffice')->latest()->get();

        return view('grant::admin.grant.index', compact('grants'));
    }

    public function create()
    {
        $this->checkAuthorization('grant_create');

        $fiscalYears = FiscalYear::all();
        $grantTypes = GrantType::all();
        $grantPrograms = GrantProgram::all();
        $grantOffices = GrantOffice::all();
        $branches = Branch::with('branches')->whereNull('branch_id')->get();

        return view('grant::admin.grant.create', compact('fiscalYears', 'grantTypes', 'grantPrograms', 'grantOffices', 'branches'));
    }

    public function store(StoreGrantRequest $request)
    {
        $this->checkAuthorization('grant_create');

        Grant::create($request->validated() + [
                'user_id' => auth()->id()
            ]);

        toast('अनुदान कार्यक्रम सफलता पुर्बक थपियो', 'success');
        return back();
    }

    public function show($id)
    {
        return view('grant::show');
    }

    public function edit($id)
    {
        return view('grant::edit');
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
