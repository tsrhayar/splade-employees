<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Tables\Permissions;
use ProtoneMedia\Splade\Facades\Splade;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    //
    public function index()
    {
        //
        return view('admin.permissions.index', [
            'permissions' => Permissions::class
        ]);
    }

    public function create()
    {
        return view('admin.permissions.create', [
            'roles' => Role::pluck('name', 'id')->toArray(),
        ]);
    }

    public function store(StorePermissionRequest $request)
    {
        //
        $permission = Permission::create($request->validated());
        $permission->syncRoles($request->roles);

        Splade::toast('Permission created successfully')
            ->centerTop()
            ->success()
            ->autoDismiss(3);
        return to_route('admin.permissions.index');

    }

    public function edit(Permission $permission)
    {
        //
        $roles = Role::pluck('name', 'id')->toArray();

        return view('admin.permissions.edit', compact('permission', 'roles'));
    }

    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        //
        $permission->update($request->validated());
        $permission->syncRoles($request->roles);
        Splade::toast('Permission updated successfully')
            ->centerTop()
            ->success()
            ->autoDismiss(3);
        return to_route('admin.permissions.index');
    }

    public function destroy(Permission $permission)
    {
        //
        $permission->delete();
        Splade::toast('Permission deleted successfully')
            ->centerTop()
            ->success()
            ->autoDismiss(3);

        return to_route('admin.permissions.index');
    }
}