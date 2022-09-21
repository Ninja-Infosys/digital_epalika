<?php

namespace Modules\EMap\Http\Controllers\Clients;

use Illuminate\Auth\Access\AuthorizationException;
use App\Http\Controllers\Controller;
use Modules\EMap\Entities\Client;
use Modules\EMap\Http\Requests\Clients\Client\StoreClientRequest;
use Modules\EMap\Http\Requests\Clients\Client\UpdateClientRequest;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::where('user_id', auth('organization')->user()->id)->get();
        return view('emap::clients.client.index');
    }

    public function create()
    {
        return view('emap::clients.client.create');
    }

    public function store(StoreClientRequest $request)
    {
        Client::create($request->validated());

        toast(' ग्राहक सफलतापूर्वक थपियो', 'success');
        return redirect(route('admin.units.measurementUnit.index'));
    }

    /**
     * @throws AuthorizationException
     */
    public function show(Client $client)
    {
        $this->authorize('view', $client);

        return view('emap::clients.client.show', compact('client'));
    }

    /**
     * @throws AuthorizationException
     */
    public function edit(Client $client)
    {
        $this->authorize('view', $client);

        return view('emap::clients.client.edit', compact('client'));
    }

    /**
     * @throws AuthorizationException
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        $this->authorize('update', $client);

        $client->update($request->validated());

        toast('ग्राहक सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.units.measurementUnit.index'));
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy(Client $client)
    {
        $this->authorize('delete', $client);

        $client->delete();

        toast('ग्राहक सफलतापूर्वक मेटाइयो', 'success');
        return redirect(route('admin.units.measurementUnit.index'));
    }
}
