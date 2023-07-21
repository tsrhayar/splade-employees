<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Tables\Users;
use ProtoneMedia\Splade\Facades\Splade;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.users.index', [
            'users' => Users::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id')->toArray();
        $permissions = Permission::pluck('name', 'id')->toArray();

        return view('admin.users.create', compact('roles', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //
        $user = User::create($request->validated());
        $user->syncRoles($request->roles);
        $user->syncPermissions($request->permissions);

        Splade::toast('User created successfully')
            ->centerTop()
            ->success()
            ->autoDismiss(3);
        return to_route('admin.users.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        $roles = Role::pluck('name', 'id')->toArray();
        $permissions = Permission::pluck('name', 'id')->toArray();
        return view('admin.users.edit', compact('user', 'roles', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
        $user->update($request->validated());
        $user->syncRoles($request->roles);
        $user->syncPermissions($request->permissions);
        Splade::toast('User updated successfully')
            ->centerTop()
            ->success()
            ->autoDismiss(3);
        return to_route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        Splade::toast('User deleted successfully')
            ->centerTop()
            ->success()
            ->autoDismiss(3);

        return to_route('admin.users.index');
    }
}