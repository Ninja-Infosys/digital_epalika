<?php

namespace Modules\Identity\Http\Controllers;

use App\Enums\StatusEnum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Identity\Entities\DisabilityIdentityCard;

class DisabilityFullDetailController extends Controller
{
    public function index()
    {
        $disabilityIdentityCards = DisabilityIdentityCard::with('disabilityType')
            ->where(function ($q) {
                if (!is_null(request('search'))) {
                    $q->whereLike([
                        'name',
                        'name_en',
                        'citizenship_no',
                        'birth_registration_no',
                        'guardian_name',
                        'guardian_name_en',
                        'phone'
                    ], request('search'));
                }
            })
            ->where('status', StatusEnum::APPROVE->value)
            ->latest()
            ->paginate(10);

        return view('identity::admin.disabilityFullDetail.index', compact('disabilityIdentityCards'));
    }

    public function create()
    {
        return view('identity::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('identity::show');
    }

    public function edit($id)
    {
        return view('identity::edit');
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
