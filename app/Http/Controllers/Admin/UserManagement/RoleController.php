<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserManagement\Role\StoreRoleRequest;
use App\Http\Requests\UserManagement\Role\UpdateRoleRequest;
use App\Models\UserManagement\Permission;
use App\Models\UserManagement\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('role_access'),
            403,
            'You are not allowed to role access'
        );

        $roles = Role::all();

        return view('admin.userManagement.role.index', compact('roles'));
    }

    public function create()
    {
        abort_if(Gate::denies('role_create'),
            403,
            'You are not allowed to role access'
        );

        $permissionGroups = $this->permissionGroups();

        return view('admin.userManagement.role.create', compact('permissionGroups'));
    }

    public function store(StoreRoleRequest $request)
    {
        abort_if(Gate::denies('role_create'),
            403,
            'You are not allowed to role create'
        );

        DB::transaction(function () use ($request) {
            $role = Role::create($request->validated());

            $role->permissions()->attach($request->validated()['permissions']);
        });

        toast('भूमिका सफलतापूर्वक सिर्जना गरियो', 'success');
        return back();
    }

    public function show(Role $role)
    {
        abort_if(Gate::denies('role_access'),
            403,
            'You are not allowed to role access'
        );
    }

    public function edit(Role $role)
    {
        abort_if(Gate::denies('role_edit'),
            403,
            'You are not allowed to role edit'
        );

        $role->load('permissions');
        $permissionGroups = $this->permissionGroups();

        return view('admin.userManagement.role.edit', compact('role', 'permissionGroups'));
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        abort_if(Gate::denies('role_edit'),
            403,
            'You are not allowed to role edit'
        );

        DB::transaction(function () use ($request, $role) {
            $role->update($request->validated());

            $role->permissions()->sync($request->validated()['permissions']);
        });

        toast('भूमिका सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.userManagement.role.index'));
    }

    public function destroy(Role $role)
    {
        abort_if(Gate::denies('role_delete'),
            403,
            'You are not allowed to role delete'
        );

        if ($role->type == 'Super') {
            toast('super role मेटाउन सकिँदैन', 'error');
            return back();
        }
        $role->permissions()->detach();
        $role->delete();

        toast('भूमिका सफलतापूर्वक मेटियो', 'success');
        return back();
    }

    private function permissionGroups()
    {
        return Permission::all()
            ->map(function ($permission) {
                $array = explode("_", $permission->title);
                $last = array_pop($array);
                return [
                    'id' => $permission->id,
                    'name' => Str::headline(implode(' ', $array)),
                    'title' => Str::headline($last),
                ];
            })->groupBy('name');
    }
}
