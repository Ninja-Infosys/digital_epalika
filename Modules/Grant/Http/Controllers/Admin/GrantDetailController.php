<?php

namespace Modules\Grant\Http\Controllers\Admin;

use App\Models\Settings\OfficeSetting;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Grant\Entities\GrantDetail;
use Modules\Grant\Entities\GrantProgram;
use Modules\Grant\Entities\GrantType;
use Modules\Grant\Http\Requests\GrantDetail\StoreGrantDetailRequest;
use Modules\Grant\Http\Requests\GrantDetail\UpdateGrantDetailRequest;

class
GrantDetailController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('grantDetail_access');

        $grantDetails = GrantDetail::with('grant.fiscalYear','grant.grantProgram', 'grant.grantType', 'model', 'localBody')
            ->where(function (Builder $q) {
                if (!is_null(request('search'))) {
                    $q->whereLike('contact', request('search'));
                    $q->orWhereHas('grant.grantProgram', function ($sub_q) {
                        $sub_q->whereLike('name', request('search'));
                    });
                }
            })
            ->latest()->paginate(10);

        return view('grant::admin.grant_detail.index', compact('grantDetails'));
    }

    public function create()
    {
        $this->checkAuthorization('grantDetail_create');

        $grantPrograms = GrantProgram::all();
        $grantTypes = GrantType::all();
        return view('grant::admin.grant_detail.create', compact('grantPrograms', 'grantTypes'));
    }

    public function show(GrantDetail $grantDetail)
    {
        $this->checkAuthorization('grantDetail_access');

        return view('grant::admin.grant_detail.show', compact('grantDetail'));
    }

    public function edit(GrantDetail $grantDetail)
    {
        $this->checkAuthorization('grantDetail_edit');

        $grantPrograms = GrantProgram::all();
        $grantTypes = GrantType::all();
        return view('grant::admin.grant_detail.edit', compact('grantDetail', 'grantPrograms', 'grantTypes'));
    }

    public function destroy(GrantDetail $grantDetail)
    {
        $this->checkAuthorization('grantDetail_delete');

        $grantDetail->delete();

        toast('अनुदान विवरण सफलतापूर्वक मेटाइयो', 'success');
        return back();
    }
}
