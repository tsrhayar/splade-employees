<?php

namespace App\Forms;

use App\Models\State;
use ProtoneMedia\Splade\AbstractForm;
use ProtoneMedia\Splade\FormBuilder\Select;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\FormBuilder\Text;
use ProtoneMedia\Splade\SpladeForm;

class UpdateCityForm extends AbstractForm
{
    public function configure(SpladeForm $form)
    {
        $form
            ->method('PUT')
            ->class('p-4 bg-white rounded-md space-y-2');
    }

    public function fields(): array
    {
        $states = State::pluck('name', 'id')->toArray();
        return [
            Text::make('name')
                ->label('Name')
                ->class('mb-3')->rules(['required', 'min:3']),
            Select::make('state_id')
                ->label('Choose a state')
                ->options($states)
                ->class('mb-3')->rules(['required']),
            //

            Submit::make()
                ->label('Update')
        ];
    }
}
