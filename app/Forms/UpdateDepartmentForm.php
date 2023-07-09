<?php

namespace App\Forms;

use ProtoneMedia\Splade\AbstractForm;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\FormBuilder\Text;
use ProtoneMedia\Splade\SpladeForm;

class UpdateDepartmentForm extends AbstractForm
{
    public function configure(SpladeForm $form)
    {
        $form
            ->method('PUT')
            ->class('p-4 bg-white rounded-md space-y-2');
    }

    public function fields(): array
    {
        return [
            Text::make('name')
                ->label('Name')
                ->class('mb-3')->rules(['required', 'min:3']),

            Submit::make()
                ->label('Update')
        ];
    }
}
