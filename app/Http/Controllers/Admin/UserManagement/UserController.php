<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserManagement\User\StoreUserRequest;
use App\Http\Requests\UserManagement\User\UpdateUserRequest;
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

    public function store(StoreUserRequest $request)
    {
        abort_if(Gate::denies('user_create'),
            403,
            'You are not allowed to user create'
        );

        User::create($request->validated() + [
                'user_id' => auth()->id(),
            ]);
        toast('User added successfully', 'success');
        return redirect(route('admin.userManagement.user.index'));
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
        $roles = Role::all();
        $user->load('role');
        return view('admin.userManagement.user.edit', compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        abort_if(Gate::denies('user_edit'),
            403,
            'You are not allowed to user edit'
        );

        $user->update($request->validated());
        toast('User updated successfully', 'success');
        return redirect(route('admin.userManagement.user.index'));

    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'),
            403,
            'You are not allowed to user delete'
        );

        $user->delete();
        toast('User deleted successfully', 'success');
        return back();
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
