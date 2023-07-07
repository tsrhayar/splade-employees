<x-admin-layout>
    <h1 class="text-2xl font-semibold py-4">Add country</h1>
    <x-splade-form method="POST" :action="route('admin.countries.store')" class="p-4 bg-white rounded-md space-y-2">
        <x-splade-input name="name" class="mb-3" label="Name" />
        <x-splade-input name="country_code" class="mb-3" label="Country code" />
       
        <x-splade-submit />
    </x-splade-form>
</x-admin-layout>
