<?php

namespace App\Livewire\Records;

use Livewire\Component;

class OptionsIndex extends Component
{
    public $activeTab = 'tab1';

    public function switchTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('livewire.records.options-index')
            ->layout('components.layouts.records', ['headingTitle' => 'Manage Records Options']);
    }
}
