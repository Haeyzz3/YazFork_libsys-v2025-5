<?php

namespace App\Livewire\Records;

use App\Models\DdcClassification;
use App\Models\LcClassification;
use App\Models\PhysicalLocation;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class ThesisCreate extends Component
{
    use WithFileUploads;

    public $ddc_classifications = [];
    public $lc_classifications = [];
    public $physical_locations = [];
    public $sources = [];
    public $acquisition_statuses = [];
    public $conditions = [];

    public $title = '';
    public $acquisition_status = '';
    public $condition = '';
    public $subject_headings = [''];

    public $researchers = [''];
    public $adviser = '';
    public $year = '';
    public $month = '';
    public $institution = '';
    public $call_number = '';
    public $ddc_class_id = '';
    public $lc_class_id = '';
    public $physical_location_id = '';

    public function mount()
    {
        // Fetch DDC classifications from the database
        $this->ddc_classifications = DdcClassification::pluck('name','id')->toArray();
        $this->lc_classifications = LcClassification::pluck('name','id')->toArray();
        $this->physical_locations = PhysicalLocation::pluck('name','id')->toArray();
        $this->sources = DB::table('sources')->pluck('label', 'key')->toArray();
        $this->acquisition_statuses = DB::table('acquisition_statuses')->pluck('label', 'key')->toArray();
        $this->conditions = DB::table('conditions')->pluck('label', 'key')->toArray();
    }

    public function render()
    {
        return view('livewire.records.thesis-create')
            ->layout('components.layouts.records', ['headingTitle' => 'Add Thesis/Dissertations']);
    }
}
