<x-admin-layout>
    <h1 class="text-2xl font-semibold py-4">Add Employee</h1>
    <x-splade-form method="POST" :action="route('admin.employees.store')" class="mb-3 p-4 bg-white rounded-md space-y-2">
        <x-splade-input name="firstname" class="mb-3" label="Firstname" />
        <x-splade-input name="lastname" class="mb-3" label="Lastname" />
        <x-splade-input name="middle_name" class="mb-3" label="Middlename" />
        <x-splade-input name="adress" class="mb-3" label="Adress" />
        <x-splade-input name="zip_code" class="mb-3" label="Zip code" />
        <x-splade-input name="birthdate" class="mb-3" label="Birthdate" date />
        <x-splade-input name="date_hired" class="mb-3" label="Date hired" date />
        <x-splade-select name="country_id" class="mb-3" label="Country" :options="$countries" />
        <x-splade-select name="state_id" class="mb-3" label="State" remote-url="`/api/states/${form.country_id}`"
            option-label="name" option-value="id" />
        <x-splade-select name="city_id" class="mb-3" label="City" remote-url="`/api/cities/${form.state_id}`"
            option-label="name" option-value="id" />
        <x-splade-select name="department_id" class="mb-3" label="Department" :options="$departments" />
        <x-splade-submit />
    </x-splade-form>
</x-admin-layout>
