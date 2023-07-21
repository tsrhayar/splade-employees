<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Tables\Roles;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

// use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //
    public function index()
    {
        //
        return view('admin.roles.index', [
            'roles' => Roles::class
        ]);
    }

    public function create()
    {
        return view('admin.roles.create', [
            'permissions' => Permission::pluck('name', 'id')->toArray(),
        ]);
    }

    public function store(StoreRoleRequest $request)
    {
        //
        $role = Role::create($request->validated());
        $role->syncPermissions($request->permissions);
        Splade::toast('Role created successfully')
            ->centerTop()
            ->success()
            ->autoDismiss(3);
        return to_route('admin.roles.index');

    }

    public function edit(Role $role)
    {
        //
        $permissions = Permission::pluck('name', 'id')->toArray();

        return view(
            'admin.roles.edit',
            compact('role', 'permissions')
        );
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        //
        $role->update($request->validated());
        $role->syncPermissions($request->permissions);
        Splade::toast('Role updated successfully')
            ->centerTop()
            ->success()
            ->autoDismiss(3);
        return to_route('admin.roles.index');
    }

    public function destroy(Role $role)
    {
        //
        $role->delete();
        Splade::toast('Role deleted successfully')
            ->centerTop()
            ->success()
            ->autoDismiss(3);

        return to_route('admin.roles.index');
    }
}