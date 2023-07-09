<?php

namespace App\Forms;

use App\Models\Country;
use ProtoneMedia\Splade\AbstractForm;
use ProtoneMedia\Splade\FormBuilder\Select;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\FormBuilder\Text;
use ProtoneMedia\Splade\SpladeForm;

class CreateStateForm extends AbstractForm
{
    public function configure(SpladeForm $form)
    {
        $form
            ->action(route('admin.states.store'))
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
            Text::make('name')
                ->label('Name')
                ->class('mb-3')->rules(['required','min:3']),
            Select::make('country_id')
                ->label('Choose a country')
                ->options($countries)
                ->class('mb-3')->rules(['required']),
            //

            Submit::make()
                ->label('Save')
        ];
    }
}
