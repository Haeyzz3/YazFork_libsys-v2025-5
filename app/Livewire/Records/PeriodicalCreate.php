<?php

namespace App\Livewire\Records;

use App\Models\DdcClassification;
use App\Models\LcClassification;
use App\Models\Record;
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

    // initialize
    public $title = '';
    public $acquisition_status = '';
    public $condition = '';
    public $subject_headings = [''];

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

    public function addAuthorField(): void
    {
        $this->authors[] = '';
    }
    public function removeAuthorField($index): void
    {
        if (isset($this->authors[$index])) {
            unset($this->authors[$index]);
            $this->authors = array_values($this->authors);
        }
    }

    public function addEditorField(): void
    {
        $this->editors[] = '';
    }
    public function removeEditorField($index): void
    {
        if (isset($this->editor[$index])) {
            unset($this->editor[$index]);
            $this->editor = array_values($this->editor);
        }
    }

    public function addSubjectHeadingField(): void
    {
        $this->subject_headings[] = '';
    }
    public function removeSubjectHeadingField($index): void
    {
        if (isset($this->subject_headings[$index])) {
            unset($this->subject_headings[$index]);
            $this->subject_headings = array_values($this->subject_headings);
        }
    }

    public function submit()
    {
        try {

            $this->validate();

            $cover_image_path = null;
            if ($this->cover_image) {
                $cover_image_path = $this->cover_image->store('uploads/periodical_covers', 'public');
            }

            $record = Record::create([
                'title' => $this->title,
                'acquisition_status' => $this->acquisition_status,
                'condition' => $this->condition,
                'subject_headings' => $this->subject_headings,

                'added_by' => auth()->user()->id,
            ]);

            $record->periodical()->create([
                'authors' =>  $this->authors,
                'editors' =>  $this->editors,
                'publication_year' => $this->publication_year,
                'publication_month' => $this->publication_month,
                'publisher' => $this->publisher,
                'volume_number' => $this->volume_number,
                'issue_number' => $this->issue_number,
                'issn' => $this->issn,
                'series_title' => $this->series_title,
                'call_number' => $this->call_number,
                'ddc_class_id' => $this->ddc_class_id,
                'lc_class_id' => $this->lc_class_id,
                'cover_image' => $cover_image_path,
                'source' => $this->source,
                'purchase_amount' => $this->purchase_amount,
                'lot_cost' => $this->lot_cost,
                'supplier' => $this->supplier,
                'donated_by' => $this->donated_by,
            ]);

            $this->reset();
            $this->resetValidation();

            session()->flash('success', 'Record added successfully!');
            return redirect()->route('periodicals.index');

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

    public function formatFileSize($bytes)
    {
        if ($bytes === 0) return '0 Bytes';
        $k = 1024;
        $sizes = ['Bytes', 'KB', 'MB', 'GB'];
        $i = floor(log($bytes) / log($k));
        return round(($bytes / pow($k, $i)), 2) . ' ' . $sizes[$i];
    }

    public function render()
    {
        return view('livewire.records.periodical-create')
            ->layout('components.layouts.records', ['headingTitle' => 'Add Periodical/Magazine']);
    }
}
