<?php

namespace Modules\Identity\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Identity\Entities\DisabilityIdentityCard;

class DisabilityIdentityCardController extends Controller
{
    public function index()
    {
        return view('identity::admin.disabilityIdentityCard.index');
    }

    public function create()
    {
        return view('identity::admin.disabilityIdentityCard.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(DisabilityIdentityCard $disabilityIdentityCard)
    {
        return view('identity::show');
    }

    public function edit(DisabilityIdentityCard $disabilityIdentityCard)
    {
        return view('identity::edit');
    }

    public function update(Request $request, DisabilityIdentityCard $disabilityIdentityCard)
    {
        //
    }

    public function destroy(DisabilityIdentityCard $disabilityIdentityCard)
    {
        //
    }
}
