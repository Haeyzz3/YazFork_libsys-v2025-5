<?php

namespace App\Livewire\Records;

use App\Models\DdcClassification;
use App\Models\PhysicalLocation;
use Illuminate\Validation\Rule;
use Livewire\Component;

class OptionsIndex extends Component
{
    public $activeTab = 'tab2';
    public $ddc_classes = [];
    public $ddcName;
    public $ddcCode;
    public $ddcId;
    public $showAddDdcModal = false;
    public $showEditDdcModal = false;
    public $showDeleteDdcModal = false;
    public $locations = [];
    public $locationName;
    public $locationSymbol;
    public $locationId;
    public $showAddLocationModal = false;
    public $showEditLocationModal = false;
    public $showDeleteLocationModal = false;

    public function mount()
    {
        $this->ddc_classes = DdcClassification::select('id', 'name', 'code')->get()->toArray();
        $this->locations = PhysicalLocation::select('id', 'name', 'symbol')->get()->toArray();
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
            'locationName' => 'required|string|max:255',
            'locationSymbol' => 'required|string|max:255',
        ];
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
        $this->resetValidation($propertyName);
    }

    public function openAddDdcModal()
    {
        $this->showAddDdcModal = true;
    }

    public function saveDdc()
    {
        $this->validate([
            'ddcName' => 'required|string|max:255',
            'ddcCode' => [
                'required',
                'string',
                'max:100',
                Rule::unique('ddc_classifications', 'code')->ignore($this->ddcId),
            ],
        ]);

        DdcClassification::create([
                'name' => $this->ddcName,
                'code' => $this->ddcCode,
            ]
        );

        $this->ddc_classes = DdcClassification::select('id', 'name', 'code')->get()->toArray();
        $this->reset(['ddcName', 'ddcCode']);
        session()->flash('success', 'DDC Classification added successfully');
        $this->closeAddDdcModal();
    }

    public function closeAddDdcModal()
    {
        $this->showAddDdcModal = false;
        $this->reset(['ddcName', 'ddcCode']);
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

        DdcClassification::updateOrCreate(
            ['id' => $this->ddcId],
            [
                'name' => $this->ddcName,
                'code' => $this->ddcCode,
            ]
        );

        $this->ddc_classes = DdcClassification::select('id', 'name', 'code')->get()->toArray();
        $this->reset(['ddcName', 'ddcCode', 'ddcId']);
        session()->flash('success', 'DDC Classification saved successfully');
        $this->closeEditDdcModal();
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

    public function openAddLocationModal()
    {
        $this->showAddLocationModal = true;
    }

    public function saveLocation()
    {
        try {

            $this->validate([
                'locationName' => 'required|string|max:255',
                'locationSymbol' => 'required|string|max:255',
            ]);

            PhysicalLocation::create([
                    'name' => $this->locationName,
                    'symbol' => $this->locationSymbol,
                ]
            );

            $this->locations = PhysicalLocation::select('id', 'name', 'symbol')->get()->toArray();
            $this->reset(['locationName', 'locationSymbol']);
            session()->flash('success', 'Location added successfully');
            $this->closeAddLocationModal();

        } catch (\Illuminate\Database\QueryException $e) {
                // Handle database-specific errors
            $message = app()->environment('production')
            ? 'Failed to add record. Please try again.'
            : 'Failed to add book: ' . $e->getMessage();
            session()->flash('error', $message);
        } catch (\Exception $e) {
            // Handle any other unexpected errors
            $message = app()->environment('production')
                ? 'An unexpected error occurred. Please try again.'
                : 'An unexpected error occurred: ' . $e->getMessage();
            session()->flash('error', $message);
        }
    }

    public function closeAddLocationModal()
    {
        $this->showAddLocationModal = false;
        $this->reset(['locationName', 'locationSymbol']);
    }

    public function openEditLocationModal($id)
    {
        $location = PhysicalLocation::findOrFail($id);
        $this->locationId = $id;
        $this->locationName = $location->name;
        $this->locationSymbol = $location->symbol;
        $this->showEditLocationModal = true;
    }

    public function closeEditLocationModal()
    {
        $this->showEditLocationModal = false;
        $this->reset(['locationName', 'locationSymbol', 'locationId']);
    }

    public function render()
    {
        return view('livewire.records.options-index', [
            'ddc_classes' => $this->ddc_classes,
        ])
            ->layout('components.layouts.records', ['headingTitle' => 'Manage Records Options']);
    }
}
