<?php

namespace Modules\EMap\Http\Controllers\Clients;

use Illuminate\Auth\Access\AuthorizationException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Modules\EMap\Entities\Client;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::with('province', 'district', 'localBody')->where('organization_id', auth('organization')->user()->id)->get();
        return view('emap::organization.clients.client.index', compact('clients'));
    }

    public function create()
    {
        return view('emap::organization.clients.client.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required',],
            'province_id' => ['required', Rule::exists('provinces', 'id')->withoutTrashed()],
            'district_id' => ['required', Rule::exists('districts', 'id')->withoutTrashed()],
            'local_body_id' => ['required', Rule::exists('local_bodies', 'id')->withoutTrashed()],
            'ward_no' => ['required',],
            'tole' => ['nullable'],
            'phone' => ['required'],
            'email' => ['nullable'],
        ]);
        Client::create($data + ['organization_id' => auth('organization')->id()]);

        toast(' सेवाग्राही सफलतापूर्वक थपियो', 'success');
        return redirect(route('organization.admin.clients.client.index'));
    }

    /**
     * @throws AuthorizationException
     */
    public function show(Client $client)
    {
        $this->authorize('view', $client);

        $client->load('mapApplies');

        return view('emap::organization.clients.client.show', compact('client'));
    }

    /**
     * @throws AuthorizationException
     */
    public function edit(Client $client)
    {
        $this->authorize('view', $client);

        return view('emap::organization.clients.client.edit', compact('client'));
    }

    /**
     * @throws AuthorizationException
     */
    public function update(Request $request, Client $client)
    {
        $this->authorize('update', $client);

        $data = $request->validate([
            'name' => ['required',],
            'province_id' => ['required', Rule::exists('provinces', 'id')->withoutTrashed()],
            'district_id' => ['required', Rule::exists('districts', 'id')->withoutTrashed()],
            'local_body_id' => ['required', Rule::exists('local_bodies', 'id')->withoutTrashed()],
            'ward_no' => ['required',],
            'tole' => ['nullable'],
            'phone' => ['required'],
            'email' => ['nullable'],
        ]);

        $client->update($data);

        toast('सेवाग्राही सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('organization.admin.clients.client.index'));
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy(Client $client)
    {
        $this->authorize('delete', $client);

        $client->delete();

        toast('सेवाग्राही सफलतापूर्वक मेटाइयो', 'success');
        return redirect(route('organization.admin.clients.client.index'));
    }
}
