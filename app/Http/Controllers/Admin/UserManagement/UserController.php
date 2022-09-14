<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserManagement\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'),
            403,
            'You are not allowed to user access'
        );

        $users = User::with('role')->whereNot('id', auth()->id())->filter()->get();

        return view('admin.userManagement.user.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'),
            403,
            'You are not allowed to user create'
        );

        $roles = Role::all();

        return view('admin.userManagement.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('user_create'),
            403,
            'You are not allowed to user create'
        );
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_access'),
            403,
            'You are not allowed to user access'
        );
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'),
            403,
            'You are not allowed to user edit'
        );
    }

    public function update(Request $request, User $user)
    {
        abort_if(Gate::denies('user_edit'),
            403,
            'You are not allowed to user edit'
        );
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'),
            403,
            'You are not allowed to user delete'
        );
    }

    public function updateStatus(User $user)
    {
        abort_if(Gate::denies('user_edit'),
            403,
            'You are not allowed to user edit'
        );

        $user->update([
            'is_active' => !$user->is_active
        ]);

        toast('User Status Updated Successfully', 'success');
        return back();
    }
}
