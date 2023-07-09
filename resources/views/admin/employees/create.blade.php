<x-admin-layout>
    <h1 class="text-2xl font-semibold py-4">Add Employee</h1>
    <x-splade-form method="POST" :action="route('admin.users.store')" class="p-4 bg-white rounded-md space-y-2">
        <x-splade-input name="firstname" class="mb-3" label="Firstname" />
        <x-splade-input name="lastname" class="mb-3" label="Lastname" />
        <x-splade-input name="middle_name" class="mb-3" label="Middlename" />
        <x-splade-input name="adress" class="mb-3" label="Adress" />
        <x-splade-input name="zip_code" class="mb-3" label="Zip code" />
        <x-splade-input name="birthdate" class="mb-3" label="Birthdate" date  />
        <x-splade-input name="date_hired" class="mb-3" label="Date hired" date  />
        <x-splade-select name="country_id" :options="$countries" />
        <x-splade-select name="state_id" remote-url="`/api/regions/${form.country_id}`" />
        <x-splade-select name="city_id" remote-url="`/api/regions/${form.state_id}`" />

        {{-- <x-splade-input name="email" label="Email" />
        <x-splade-input type="password" name="password" label="Password" />
        <x-splade-input type="password" name="password_confirmation" label="Confirm password" /> --}}

        <x-splade-submit />
    </x-splade-form>
</x-admin-layout>
