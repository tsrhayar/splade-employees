<x-admin-layout>
    <h1 class="text-2xl font-semibold py-4">Add permission</h1>
    <x-splade-form method="POST" :action="route('admin.permissions.store')" class="p-4 bg-white rounded-md space-y-2">
        <x-splade-input name="name" class="mb-3" label="Name" placeholder='Name' />
        <x-splade-select name="roles[]" class="mb-3" label="Roles"  :options="$roles" multiple choices />
        <x-splade-submit />
    </x-splade-form>
</x-admin-layout>
