<?php

namespace App\Http\Controllers;

use App\Forms\CreateDepartmentForm;
use App\Forms\UpdateDepartmentForm;
use App\Models\Department;
use App\Tables\Departments;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.departments.index', [
            'departments' => Departments::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.departments.create', [
            'form' => CreateDepartmentForm::class,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, CreateDepartmentForm $form)
    {
        //
        $data = $form->validate($request);
        Department::create($data);
        Splade::toast('Department created successfully')
            ->centerTop()
            ->success()
            ->autoDismiss(3);
        return to_route('admin.departments.index');
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
    public function edit(Department $department)
    {
        //
        return view('admin.departments.edit', [
            'form' => UpdateDepartmentForm::make()
                ->action(route('admin.departments.update', $department))
                ->fill($department),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department, UpdateDepartmentForm $form)
    {
        //
        $data = $form->validate($request);
        $department->update($data);
        Splade::toast('Department updated successfully')
            ->centerTop()
            ->success()
            ->autoDismiss(3);

        return to_route('admin.departments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        //
        $department->delete();
        Splade::toast('Department deleted successfully')
            ->centerTop()
            ->success()
            ->autoDismiss(3);

        return to_route('admin.departments.index');
    }
}
