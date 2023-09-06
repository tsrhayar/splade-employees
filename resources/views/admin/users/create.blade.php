<x-admin-layout>
    <h1 class="text-2xl font-semibold py-4">Add user</h1>
    <x-splade-form method="POST" :action="route('admin.users.store')" class="p-4 bg-white rounded-md space-y-2 mb-8">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <x-splade-input name="username" class="mb-3" label="Username" placeholder="Username" />
            </div>
            <div>
                <x-splade-input name="email" label="Email" placeholder="Email" />
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <x-splade-input name="first_name" class="mb-3" label="Firstname" placeholder="Firstname" />
            </div>
            <div>
                <x-splade-input name="last_name" class="mb-3" label="Lastname" placeholder="Lastname" />
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <x-splade-input type="password" name="password" label="Password" placeholder="Password" />
            </div>
            <div>
                <x-splade-input type="password" name="password_confirmation" label="Confirm password"
                    placeholder="Confirm password" />
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <x-splade-input type="password" name="password" label="Password" placeholder="Password" />
            </div>
            <div>
                <x-splade-input type="password" name="password_confirmation" label="Confirm password"
                    placeholder="Confirm password" />
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <x-splade-select name="roles[]" label="Roles" class="mb-3" :options="$roles" multiple relation
                    choices placeholder="Roles" />
            </div>
            <div>
                <x-splade-select name="permissions[]" label="Permissions" class="mb-3" :options="$permissions" multiple
                    relation choices placeholder="Permissions" />
            </div>
        </div>
        <x-splade-submit />
    </x-splade-form>
</x-admin-layout>
