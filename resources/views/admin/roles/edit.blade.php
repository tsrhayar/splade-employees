<x-admin-layout>
    <h1 class="text-2xl font-semibold py-4">Edit role</h1>
    <x-splade-form :default="$role" method="PUT" :action="route('admin.roles.update', $role)" class="p-4 bg-white rounded-md space-y-2">
        <x-splade-input name="name" class="mb-3" label="Name" placeholder='Name' />


        <x-splade-submit />
    </x-splade-form>
</x-admin-layout>
