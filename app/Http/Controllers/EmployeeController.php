<?php

namespace App\Http\Controllers;

use App\Forms\CreateEmployeeForm;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Country;
use App\Models\Department;
use App\Models\Employee;
use App\Tables\Employees;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.employees.index', [
            'employees' => Employees::class,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.employees.create', [
            'countries' => Country::pluck('name', 'id')->toArray(),
            'departments' => Department::pluck('name', 'id')->toArray(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        //
        Employee::create($request->validated());
        Splade::toast('Employee created successfully')
            ->centerTop()
            ->success()
            ->autoDismiss(3);
        return to_route('admin.employees.index');

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
    public function edit(Employee $employee)
    {
        //
        return view('admin.employees.edit', [
            'employee' => $employee,
            'countries' => Country::pluck('name', 'id')->toArray(),
            'departments' => Department::pluck('name', 'id')->toArray(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        //
        $employee->update($request->validated());
        Splade::toast('Employee updated successfully')
            ->centerTop()
            ->success()
            ->autoDismiss(3);
        return to_route('admin.employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
        $employee->delete();
        Splade::toast('Employee deleted successfully')
            ->centerTop()
            ->success()
            ->autoDismiss(3);

        return to_route('admin.employees.index');
    }
}