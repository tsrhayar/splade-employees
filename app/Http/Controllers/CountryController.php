<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Models\Country;
use App\Tables\Countries;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use ProtoneMedia\Splade\Facades\Splade;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\SpladeForm;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // dd(Str::substr("erererer",0,3));

        return view('admin.countries.index', [
            'countries' => Countries::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCountryRequest $request)
    {
        //

        Country::create($request->validated());
        Splade::toast('Country created successfully')
            ->centerTop()
            ->success()
            ->autoDismiss(3);
        return to_route('admin.countries.index');
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
    public function edit(Country $country)
    {
        //
        // return view('admin.countries.edit', compact('country'));

        $form = SpladeForm::make()
            ->action(route('admin.countries.update', $country))
            ->fields([
                Input::make('name')->label('Name')->class('mb-3'),
                Input::make('country_code')->label('Country Code')->class('mb-3'),
                Submit::make()->label('Update')
            ])
            ->fill($country)
            ->method('PUT')->class('p-4 bg-white rounded-md space-y-2');

        return view('admin.countries.edit', compact('form', 'country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCountryRequest $request, Country $country)
    {
        //
        $country->update($request->validated());
        Splade::toast('Country updated successfully')
            ->centerTop()
            ->success()
            ->autoDismiss(3);
        return to_route('admin.countries.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        //
        $country->delete();
        Splade::toast('Country deleted successfully')
            ->centerTop()
            ->success()
            ->autoDismiss(3);

        return to_route('admin.countries.index');
    }
}
