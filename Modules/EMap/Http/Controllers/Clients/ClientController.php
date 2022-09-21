<?php

namespace Modules\EMap\Http\Controllers\Clients;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\EMap\Entities\Client;
use Modules\EMap\Http\Requests\Clients\Client\StoreCLientRequest;
use Modules\EMap\Http\Requests\Clients\Client\UpdateCLientRequest;

class ClientController extends Controller
{
    public function index()
    {
        return view('emap::index');
    }

    public function create()
    {
        return view('emap::create');
    }

    public function store(StoreCLientRequest $request)
    {
        //
    }

    public function show(Client $client)
    {
        return view('emap::show');
    }

    public function edit(Client $client)
    {
        return view('emap::edit');
    }

    public function update(UpdateCLientRequest $request, Client $client)
    {
        //
    }

    public function destroy(Client $client)
    {
        //
    }
}
