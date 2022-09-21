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
            : Response::deny('You do not own this post.');
    }

    public function create(User $user)
    {
        //
    }

    public function update(User $user, Client $client)
    {
        return $user->id === $client->user_id;
    }

    public function delete(User $user, Client $client)
    {
        return $user->id === $client->user_id;
    }

    public function restore(User $user, Client $client)
    {
        return $user->id === $client->user_id;
    }

    public function forceDelete(User $user, Client $client)
    {
        return $user->id === $client->user_id;
    }
}
