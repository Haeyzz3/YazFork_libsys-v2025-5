<?php

namespace App\Livewire\Records;

use Livewire\Component;

class ThesisCreate extends Component
{

    public function render()
    {
        return view('livewire.records.thesis-create')
            ->layout('components.layouts.records', ['headingTitle' => 'Add Thesis/Dissertations']);
    }
}
