<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Events\ActivityLogEvent;
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
            'तपाईंलाई प्रयोगकर्ता पहुँच गर्न अनुमति छैन'
        );

        $users = User::with('role')->whereNot('id', auth()->id())->filter()->get();

        return view('admin.userManagement.user.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'),
            403,
            'तपाईंलाई प्रयोगकर्ता सिर्जना गर्न अनुमति छैन'
        );

        $roles = Role::all();

        return view('admin.userManagement.user.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        abort_if(Gate::denies('user_create'),
            403,
            'तपाईंलाई प्रयोगकर्ता सिर्जना गर्न अनुमति छैन'
        );

        User::create($request->validated() + [
                'user_id' => auth()->id(),
            ]);

        toast('प्रयोगकर्ता सफलतापूर्वक थपियो', 'success');
        return redirect(route('admin.userManagement.user.index'));
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_access'),
            403,
            'तपाईंलाई प्रयोगकर्ता पहुँच गर्न अनुमति छैन'
        );
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'),
            403,
            'तपाईंलाई प्रयोगकर्ता सम्पादन गर्न अनुमति छैन'
        );
        $roles = Role::all();
        $user->load('role');
        return view('admin.userManagement.user.edit', compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        abort_if(Gate::denies('user_edit'),
            403,
            'तपाईंलाई प्रयोगकर्ता सम्पादन गर्न अनुमति छैन'
        );

        $user->update($request->validated());

        toast('प्रयोगकर्ता सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.userManagement.user.index'));

    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'),
            403,
            'तपाईंलाई प्रयोगकर्ता मेटाउन अनुमति छैन'
        );

        $user->delete();

        toast('प्रयोगकर्ता सफलतापूर्वक मेटाइयो', 'success');
        return back();
    }

    public function updateStatus(User $user)
    {
        abort_if(Gate::denies('user_edit'),
            403,
            'तपाईंलाई प्रयोगकर्ता सम्पादन गर्न अनुमति छैन'
        );

        $user->update([
            'is_active' => !$user->is_active
        ]);

        toast('प्रयोगकर्ता स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }
}
