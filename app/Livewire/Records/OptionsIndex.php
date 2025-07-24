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
        $this->ddcName = $ddc->name;
        $this->ddcCode = $ddc->code;
        $this->showEditDdcModal = true;
    }

    public function closeEditDdcModal()
    {
        $this->showEditDdcModal = false;
        $this->reset(['ddcName', 'ddcCode', 'ddcId']);
    }

    public function updateDdc()
    {
        $this->validate();

        DdcClassification::update(
            ['id' => $this->ddcId],
            [
                'name' => $this->ddcName,
                'code' => $this->ddcCode,
            ]
        );

        $this->ddc_classes = DdcClassification::select('id', 'name', 'code')->get()->toArray();
        $this->reset(['ddcName', 'ddcCode', 'ddcId']);
        session()->flash('success', 'DDC Classification saved successfully');
        $this->closeEditModal();
    }

    public function openDeleteDdcModal($id)
    {
        $ddc = DdcClassification::findOrFail($id);
        $this->ddcId = $id;
        $this->ddcName = $ddc->name;
        $this->showDeleteDdcModal = true;
    }

    public function closeDeleteDdcModal()
    {
        $this->showDeleteDdcModal = false;
        $this->reset(['ddcName', 'ddcId']);
    }

    public function deleteDdc($id)
    {
        $ddc = DdcClassification::findOrFail($id);
        $ddc->delete();
        $this->ddc_classes = DdcClassification::select('id', 'name', 'code')->get()->toArray();
        $this->closeDeleteDdcModal();
        session()->flash('message', 'DDC Classification deleted successfully.');
    }

    public function openAddDdcModal()
    {
        $this->showAddDdcModal = true;
    }

    public function saveDdc()
    {
        $this->validate();

        DdcClassification::create([
                'name' => $this->ddcName,
                'code' => $this->ddcCode,
            ]
        );

        $this->ddc_classes = DdcClassification::select('id', 'name', 'code')->get()->toArray();
        $this->reset(['ddcName', 'ddcCode']);
        session()->flash('success', 'DDC Classification added successfully');
        $this->closeAddModal();
    }

    public function closeAddModal()
    {
        $this->showAddDdcModal = false;
        $this->reset(['ddcName', 'ddcCode']);
    }

    public function render()
    {
        return view('livewire.records.options-index', [
            'ddc_classes' => $this->ddc_classes,
        ])
            ->layout('components.layouts.records', ['headingTitle' => 'Manage Records Options']);
    }
}
