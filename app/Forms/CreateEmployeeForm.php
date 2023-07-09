<?php

namespace App\Forms;

use App\Models\Country;
use ProtoneMedia\Splade\AbstractForm;
use ProtoneMedia\Splade\FormBuilder\Select;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\FormBuilder\Text;
use ProtoneMedia\Splade\SpladeForm;

class CreateEmployeeForm extends AbstractForm
{
    public function configure(SpladeForm $form)
    {
        $form
            ->action(route('admin.cities.store'))
            ->method('POST')
            ->class('p-4 bg-white rounded-md space-y-2')
            ->fill([
                //
            ]);
    }

    public function fields(): array
    {
        $countries = Country::pluck('name', 'id')->toArray();
        return [
            Text::make('fisrtname')
                ->label('Firstname')
                ->class('mb-3')->rules(['required', 'min:2']),
            Text::make('lastname')
                ->label('Lastname')
                ->class('mb-3')->rules(['required', 'min:2']),
            Text::make('middle_name')
                ->label('Middlename')
                ->class('mb-3')->rules(['required', 'min:2']),
            Text::make('adress')
                ->label('Adress')
                ->class('mb-3')->rules(['required', 'min:2']),
            Select::make('city_id')
                ->label('Choose a state')
                ->options($countries)
                ->class('mb-3')->rules(['required']),
            //

            Submit::make()
                ->label('Save')
        ];
    }
}
