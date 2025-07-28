<?php

namespace App\Livewire\Records;

use App\Models\DdcClassification;
use App\Models\PhysicalLocation;
use App\Models\Source;
use Illuminate\Validation\Rule;
use Livewire\Component;

class OptionsIndex extends Component
{
    public $activeTab = 'tab3';
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
    public $sources = [];
    public $sourceName;
    public $sourceId;
    public $showAddSourceModal = false;
    public $showEditSourceModal = false;
    public $showDeleteSourceModal = false;

    public function mount()
    {
        $this->ddc_classes = DdcClassification::select('id', 'name', 'code')->get()->toArray();
        $this->locations = PhysicalLocation::select('id', 'name', 'symbol')->get()->toArray();
        $this->sources = Source::select('id', 'name')->get()->toArray();
    }

    public function switchTab($tab)
    {
        $this->activeTab = $tab;
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
        $this->validate([
            'ddcName' => 'required|string|max:255',
            'ddcCode' => [
                'required',
                'string',
                'max:100',
                Rule::unique('ddc_classifications', 'code')->ignore($this->ddcId),
            ],
        ]);

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

    public function deleteDdc($id)
    {
        $ddc = DdcClassification::findOrFail($id);
        $ddc->delete();
        $this->ddc_classes = DdcClassification::select('id', 'name', 'code')->get()->toArray();
        $this->closeDeleteDdcModal();
        session()->flash('success', 'DDC Classification deleted successfully.');
    }

    public function closeDeleteDdcModal()
    {
        $this->showDeleteDdcModal = false;
        $this->reset(['ddcName', 'ddcId']);
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
                'locationSymbol' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('physical_locations', 'symbol')->ignore($this->locationId),
                ],
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
            : 'Failed to add record: ' . $e->getMessage();
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

    public function updateLocation()
    {
        try {

            $this->validate([
                'locationName' => 'required|string|max:255',
                'locationSymbol' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('physical_locations', 'symbol')->ignore($this->locationId),
                ],
            ]);

            PhysicalLocation::updateOrCreate(
                ['id' => $this->locationId],
                [
                    'name' => $this->locationName,
                    'symbol' => $this->locationSymbol,
                ]
            );

            $this->locations = PhysicalLocation::select('id', 'name', 'symbol')->get()->toArray();
            $this->reset(['locationName', 'locationSymbol', 'locationId']);
            session()->flash('success', 'Location updated successfully');
            $this->closeEditLocationModal();

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

    public function closeEditLocationModal()
    {
        $this->showEditLocationModal = false;
        $this->reset(['locationName', 'locationSymbol', 'locationId']);
    }

    public function openDeleteLocationModal($id)
    {
        $location = PhysicalLocation::findOrFail($id);
        $this->locationId = $id;
        $this->locationName = $location->name;
        $this->showDeleteLocationModal = true;
    }

    public function deleteLocation($id)
    {
        $location = PhysicalLocation::findOrFail($id);
        $location->delete();
        $this->locations = PhysicalLocation::select('id', 'name', 'symbol')->get()->toArray();
        $this->closeDeleteLocationModal();
        session()->flash('success', 'Location deleted successfully.');
    }

    public function closeDeleteLocationModal()
    {
        $this->showDeleteLocationModal = false;
        $this->reset(['locationName', 'locationId']);
    }

    public function openAddSourceModal()
    {
        $this->showAddSourceModal = true;
    }

    public function saveSource()
    {
        try {

            $this->validate([
                'sourceName' => 'required|string|max:255',
            ]);

            Source::create([
                'name' => $this->sourceName,
                'key' => strtolower(str_replace(' ', '_', $this->sourceName))
            ]);

            $this->sources = Source::select('id', 'name')->get()->toArray();
            $this->reset(['sourceName']);
            session()->flash('success', 'Source added successfully');
            $this->closeAddSourceModal();

        } catch (\Illuminate\Database\QueryException $e) {
            // Handle database-specific errors
            $message = app()->environment('production')
                ? 'Failed to add record. Please try again.'
                : 'Failed to add record: ' . $e->getMessage();
            session()->flash('error', $message);
        } catch (\Exception $e) {
            // Handle any other unexpected errors
            $message = app()->environment('production')
                ? 'An unexpected error occurred. Please try again.'
                : 'An unexpected error occurred: ' . $e->getMessage();
            session()->flash('error', $message);
        }
    }

    public function closeAddSourceModal()
    {
        $this->showAddSourceModal = false;
        $this->reset(['sourceName']);
    }

    public function openEditSourceModal($id)
    {
        $source = Source::findOrFail($id);
        $this->sourceId = $id;
        $this->sourceName = $source->name;
        $this->showEditSourceModal = true;
    }

    public function updateSource()
    {
        try {

            $this->validate([
                'sourceName' => 'required|string|max:255',
            ]);

            Source::updateOrCreate(
                ['id' => $this->sourceId],
                [
                    'name' => $this->sourceName,
                    'key' => strtolower(str_replace(' ', '_', $this->sourceName))
                ]
            );

            $this->sources = Source::select('id', 'name')->get()->toArray();
            $this->reset(['sourceName', 'sourceId']);
            session()->flash('success', 'Source updated successfully');
            $this->closeEditSourceModal();

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

    public function closeEditSourceModal()
    {
        $this->showEditSourceModal = false;
        $this->reset(['sourceName', 'sourceId']);
    }

    public function openDeleteSourceModal($id)
    {
        $source = Source::findOrFail($id);
        $this->sourceId = $id;
        $this->sourceName = $source->name;
        $this->showDeleteSourceModal = true;
    }

    public function deleteSource($id)
    {
        $source = Source::findOrFail($id);
        $source->delete();
        $this->sources = Source::select('id', 'name')->get()->toArray();
        $this->closeDeleteSourceModal();
        session()->flash('success', 'Source deleted successfully');
    }

    public function closeDeleteSourceModal()
    {
        $this->showDeleteSourceModal = false;
        $this->reset(['sourceName', 'sourceId']);
    }

    public function render()
    {
        return view('livewire.records.options-index', [
            'ddc_classes' => $this->ddc_classes,
        ])
            ->layout('components.layouts.records', ['headingTitle' => 'Manage Records Options']);
    }
}
