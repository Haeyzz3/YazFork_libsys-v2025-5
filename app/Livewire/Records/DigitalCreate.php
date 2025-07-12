<?php

namespace App\Livewire\Records;

use Livewire\Component;

class DigitalCreate extends Component
{
    public function render()
    {
        return view('livewire.records.digital-create')->layout('components.layouts.records', ['headingTitle' => 'Add Multimedia']);
    }
}
