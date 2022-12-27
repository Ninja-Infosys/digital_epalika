<?php

namespace Modules\Grant\Http\Controllers\Admin;

use App\Models\Settings\FiscalYear;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Grant\Entities\Grant;
use Modules\Grant\Entities\GrantOffice;
use Modules\Grant\Entities\GrantProgram;
use Modules\Grant\Entities\GrantType;
use Modules\Grant\Http\Requests\Grant\StoreGrantRequest;
use Modules\Grant\Http\Requests\Grant\UpdateGrantRequest;
use Modules\HelpDesk\Entities\Branch;
use Illuminate\Database\Eloquent\Builder;

class GrantController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('grant_access');

        $grants = Grant::with('fiscalYear','grantType','branch', 'grantProgram', 'grantOffice')->where(function (Builder $q) {
            if (!is_null(request('search'))) {
                $q->whereLike(['fiscalYear', 'grantOffice', 'grantProgram', 'grantType',], request('search'));
            }
        })
            ->latest()->paginate(10);

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

    public function edit(Grant $grant): Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        $this->checkAuthorization('grant_edit');

        $fiscalYears = FiscalYear::all();
        $grantTypes = GrantType::all();
        $grantPrograms = GrantProgram::all();
        $grantOffices = GrantOffice::all();
        $branches = Branch::with('branches')->whereNull('branch_id')->get();

        return view('grant::admin.grant.edit', compact('grant', 'fiscalYears', 'grantTypes','grantPrograms','grantOffices', 'branches'));
    }

    public function update(UpdateGrantRequest $request, Grant $grant)
    {
        $this->checkAuthorization('grant_edit');
        $grant->update($request->validated());
        toast('अनुदान सफलता पुर्वक सम्पादन गरियो', 'success');
        return redirect(route('admin.grant.grant.index'));
    }

    public function destroy(Grant $grant)
    {
        $grant->delete();

        toast('अनुदान सफलता पुर्वक हटाईयो !', 'success');

        return back();
    }
}
