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

    public function rules()
    {
        return [
            // Records fields
            'title' => 'required|string|max:255',
            'acquisition_status' => 'nullable|string|max:50',
            'condition' => 'nullable|string|max:100',
            'subject_headings.*' => 'string|max:100',

            // Periodicals fields
            'authors.*' => 'string|max:100',
            'editors.*' => 'string|max:100',
            'publication_year' => 'nullable|integer|min:1000|max:' . now()->year,
            'publication_month' => 'nullable|integer|min:1|max:12',
            'publisher' => 'nullable|string|max:255',
            'volume_number' => 'nullable|string|max:50',
            'issue_number' => 'nullable|string|max:50',
            'issn' => 'nullable|string|max:20|unique:periodicals,issn',
            'series_title' => 'nullable|string|max:255',
            'call_number' => 'nullable|string|max:50',
            'ddc_class_id' => 'nullable|exists:ddc_classifications,id',
            'lc_class_id' => 'nullable|exists:lc_classifications,id',
            'cover_image' => 'nullable|image|max:2048', // adjust size if needed
            'source' => 'nullable|string|max:100',
            'purchase_amount' => 'nullable|numeric|min:0',
            'lot_cost' => 'nullable|numeric|min:0',
            'supplier' => 'nullable|string|max:255',
            'donated_by' => 'nullable|string|max:255',
        ];
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
        $this->resetValidation($propertyName);
    }

    public function render()
    {
        return view('livewire.records.periodical-create')
            ->layout('components.layouts.records', ['headingTitle' => 'Add Periodical/Magazine']);
    }
}
