<?php

namespace App\Livewire\Records;

use App\Models\DdcClassification;
use Livewire\Component;

class OptionsIndex extends Component
{
    public $activeTab = 'tab1';
    public $ddc_classes = [];

    public function mount()
    {
        $this->ddc_classes = DdcClassification::select('id', 'name', 'code')->get()->toArray();
    }

    public function switchTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('livewire.records.options-index', [
            'ddc_classes' => $this->ddc_classes,
        ])
            ->layout('components.layouts.records', ['headingTitle' => 'Manage Records Options']);
    }
}
