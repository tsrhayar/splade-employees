<x-admin-layout>
    <div class="flex justify-between">
        <h1 class="text-2xl font-semibold py-4">Employees</h1>
        <div class="p-4 pr-0">
            <Link class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded"
                href="{{ route('admin.employees.create') }}">
            Create
            </Link>
        </div>
    </div>
    <x-splade-table :for="$employees">
        @cell('action', $employee)
            <Link class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded"
                href="{{ route('admin.employees.edit', $employee) }}">
            Edit
            </Link>
            <Link confirm class="ml-1 bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded" method="DELETE"
                href="{{ route('admin.employees.destroy', $employee) }}">
            Delete
            </Link>
        @endcell
    </x-splade-table>
</x-admin-layout>
