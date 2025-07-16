<?php

namespace App\Livewire\Records;

use App\Models\DdcClassification;
use App\Models\LcClassification;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class PeriodicalCreate extends Component
{
    use WithFileUploads;

    public $ddc_classifications = [];
    public $lc_classifications = [];
    public $sources = [];
    public $acquisition_statuses = [];
    public $conditions = [];

    public $title = '';
    public $authors = [''];
    public $editors = [''];
    public $publication_year = '';
    public $publication_month = '';
    public $publisher = '';
    public $volume_number = '';
    public $issue_number = '';
    public $issn = '';
    public $series_title = '';
    public $call_number = '';
    public $ddc_class_id = '';
    public $lc_class_id = '';
    public $cover_image = '';
    public $source = '';
    public $purchase_amount = '';
    public $lot_cost = '';
    public $supplier = '';
    public $donated_by = '';
    public $acquisition_status = '';
    public $condition = '';
    public $subject_headings = [''];

    public function mount()
    {
        // Fetch DDC classifications from the database
        $this->ddc_classifications = DdcClassification::pluck('name','id')->toArray();
        $this->lc_classifications = LcClassification::pluck('name','id')->toArray();
        $this->sources = DB::table('sources')->pluck('label', 'key')->toArray();
        $this->acquisition_statuses = DB::table('acquisition_statuses')->pluck('label', 'key')->toArray();
        $this->conditions = DB::table('conditions')->pluck('label', 'key')->toArray();
    }

    public function render()
    {
        return view('livewire.records.periodical-create')
            ->layout('components.layouts.records', ['headingTitle' => 'Add Periodical/Magazine']);
    }
}
