<?php

namespace Modules\EMap\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Modules\EMap\Entities\Client;

class ClientPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user, Client $client)
    {
        return $user->id === $client->user_id ? Response::allow()
            : Response::denyAsNotFound();
    }

    public function create(User $user)
    {
        //
    }

    public function update(User $user, Client $client)
    {
        return $user->id === $client->user_id ? Response::allow()
            : Response::denyAsNotFound();
    }

    public function delete(User $user, Client $client)
    {
        return $user->id === $client->user_id ? Response::allow()
            : Response::denyAsNotFound();
    }

    public function restore(User $user, Client $client)
    {
        return $user->id === $client->user_id ? Response::allow()
            : Response::denyAsNotFound();
    }

    public function forceDelete(User $user, Client $client)
    {
        return $user->id === $client->user_id ? Response::allow()
            : Response::denyAsNotFound();
    }
}
