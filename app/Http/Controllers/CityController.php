<?php

namespace App\Http\Controllers;

use App\Forms\CreateCityForm;
use App\Forms\UpdateCityForm;
use App\Models\City;
use App\Tables\Cities;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.cities.index', [
            'cities' => Cities::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.cities.create', [
            'form' => CreateCityForm::class,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, CreateCityForm $form)
    {
        //
        $data = $form->validate($request);
        City::create($data);
        Splade::toast('City created successfully')
            ->centerTop()
            ->success()
            ->autoDismiss(3);
        return to_route('admin.cities.index');
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
    public function edit(City $city)
    {
        //
        return view('admin.cities.edit', [
            'form' => UpdateCityForm::make()
                ->action(route('admin.cities.update', $city))
                ->fill($city),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city, UpdateCityForm $form)
    {
        //
        $data = $form->validate($request);
        $city->update($data);
        Splade::toast('City updated successfully')
            ->centerTop()
            ->success()
            ->autoDismiss(3);

        return to_route('admin.cities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        //
        $city->delete();
        Splade::toast('City deleted successfully')
            ->centerTop()
            ->success()
            ->autoDismiss(3);

        return to_route('admin.cities.index');
    }
}
