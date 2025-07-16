<?php

namespace App\Livewire\Records;

use Livewire\Component;

class PeriodicalCreate extends Component
{
    public function render()
    {
        return view('livewire.records.periodical-create')
            ->layout('components.layouts.records', ['headingTitle' => 'Add Periodical/Magazine']);
    }
}
