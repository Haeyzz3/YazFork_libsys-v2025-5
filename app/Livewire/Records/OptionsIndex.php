<?php

namespace App\Livewire\Records;

use App\Models\DdcClassification;
use Illuminate\Validation\Rule;
use Livewire\Component;

class OptionsIndex extends Component
{
    public $activeTab = 'tab1';
    public $ddc_classes = [];
    public $showEditDdcModal = false;
    public $showDeleteDdcModal = false;
    public $showAddDdcModal = false;
    public $ddcName;
    public $ddcCode;
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
            'ddcName' => 'required|string|max:255',
            'ddcCode' => [
                'required',
                'string',
                'max:100',
                Rule::unique('ddc_classifications', 'code')->ignore($this->ddcId),
            ],
        ];
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
        $this->resetValidation($propertyName);
    }

    public function openEditDdcModal($id)
    {
        $ddc = DdcClassification::findOrFail($id);
        $this->ddcId = $id;
        $this->name = $ddc->name;
        $this->code = $ddc->code;
        $this->showEditDdcModal = true;
    }

    public function closeEditDdcModal()
    {
        $this->showEditDdcModal = false;
        $this->reset(['name', 'code', 'ddcId']);
    }

    public function saveDdc()
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
        $this->closeEditModal();
    }

    public function openDeleteDdcModal($id)
    {
        $ddc = DdcClassification::findOrFail($id);
        $this->ddcId = $id;
        $this->name = $ddc->name;
        $this->showDeleteDdcModal = true;
    }

    public function closeDeleteDdcModal()
    {
        $this->showDeleteDdcModal = false;
        $this->reset(['name', 'ddcId']);
    }

    public function deleteDdc($id)
    {

    }

    public function openAddDdcModal()
    {
        $this->showAddDdcModal = true;
    }

    public function render()
    {
        return view('livewire.records.options-index', [
            'ddc_classes' => $this->ddc_classes,
        ])
            ->layout('components.layouts.records', ['headingTitle' => 'Manage Records Options']);
    }
}
