<x-admin-layout>
    <h1 class="text-2xl font-semibold py-4">Edit permission</h1>
    <x-splade-form :default="$permission" method="PUT" :action="route('admin.permissions.update', $permission)" class="p-4 bg-white rounded-md space-y-2">
        <x-splade-input name="name" class="mb-3" label="Name" placeholder='Name' />
        <x-splade-select name="roles[]" label="Roles" class="mb-3" :options="$roles" multiple relation choices />

        <x-splade-submit />
    </x-splade-form>
</x-admin-layout>
