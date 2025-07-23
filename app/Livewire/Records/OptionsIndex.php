<?php

namespace App\Livewire\Records;

use App\Models\DdcClassification;
use Livewire\Component;

class OptionsIndex extends Component
{
    public $activeTab = 'tab1';
    public $ddc_classes = [];
    public $showModal = false;
    public $name;
    public $code;
    public $ddcId;

    public function mount()
    {
        $this->ddc_classes = DdcClassification::select('id', 'name', 'code')->get()->toArray();
    }

    public function switchTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:100|unique:ddc_classifications,code',
        ];
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
        $this->resetValidation($propertyName);
    }

    public function openEditModal($id)
    {
        $ddc = DdcClassification::findOrFail($id);
        $this->ddcId = $id;
        $this->name = $ddc->name;
        $this->code = $ddc->code;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset(['name', 'code', 'ddcId']);
    }

    public function save()
    {
        $this->validate();

        DdcClassification::updateOrCreate(
            ['id' => $this->ddcId],
            [
                'name' => $this->name,
                'code' => $this->code,
            ]
        );

        $this->ddc_classes = DdcClassification::select('id', 'name', 'code')->get()->toArray();
        $this->reset(['name', 'code', 'ddcId']);
        session()->flash('success', 'DDC Classification saved successfully');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.records.options-index', [
            'ddc_classes' => $this->ddc_classes,
        ])
            ->layout('components.layouts.records', ['headingTitle' => 'Manage Records Options']);
    }
}
