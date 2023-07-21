<x-admin-layout>
    <h1 class="text-2xl font-semibold py-4">Add user</h1>
    <x-splade-form method="POST" :action="route('admin.users.store')" class="p-4 bg-white rounded-md space-y-2">
        <x-splade-input name="username" class="mb-3" label="Username" />
        <x-splade-input name="first_name" class="mb-3" label="Firstname" />
        <x-splade-input name="last_name" class="mb-3" label="Lastname" />
        <x-splade-input name="email" label="Email" />
        <x-splade-input type="password" name="password" label="Password" />
        <x-splade-input type="password" name="password_confirmation" label="Confirm password" />
        <x-splade-select name="permissions[]" label="Permissions" class="mb-3" :options="$permissions" multiple relation
            choices />
        <x-splade-select name="roles[]" label="Roles" class="mb-3" :options="$roles" multiple relation
            choices />
        <x-splade-submit />
    </x-splade-form>
</x-admin-layout>
