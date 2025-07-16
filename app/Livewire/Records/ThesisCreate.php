<?php

namespace App\Livewire\Records;

use App\Models\DdcClassification;
use App\Models\LcClassification;
use App\Models\PhysicalLocation;
use App\Models\Record;
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

    public $accession_number = '';
    public $title = '';
    public $acquisition_status = '';
    public $condition = '';
    public $subject_headings = [''];

    public $researchers = [''];
    public $adviser = '';
    public $year = '';
    public $month = '';
    public $institution = '';
    public $college = '';
    public $degree_program = '';
    public $degree_level = '';
    public $call_number = '';
    public $ddc_class_id = '';
    public $lc_class_id = '';
    public $physical_location_id = '';
    public $abstract;

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

    public function rules()
    {
        return [
            // Records fields
            'accession_number' => 'required|string|max:50',
            'title' => 'required|string|max:255',
            'acquisition_status' => 'nullable|string|max:50',
            'condition' => 'nullable|string|max:100',
            'subject_headings.*' => 'nullable|string|max:100',

            // Thesis/dissertation-specific fields
            'researchers.*' => 'required|string|max:100',
            'adviser' => 'nullable|string|max:100',
            'year' => 'nullable|integer|min:1000|max:' . now()->year,
            'month' => 'nullable|integer|min:1|max:12',
            'institution' => 'nullable|string|max:255',
            'college' => 'nullable|string|max:255',
            'degree_program' => 'nullable|string|max:255',
            'degree_level' => 'nullable|string|max:255',
            'call_number' => 'nullable|string|max:50',
            'ddc_class_id' => 'nullable|exists:ddc_classifications,id',
            'lc_class_id' => 'nullable|exists:lc_classifications,id',
            'physical_location_id' => 'nullable|exists:physical_locations,id',
            'abstract' => 'required|file|mimes:pdf|max:10240', // Example: max 10MB
        ];
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
        $this->resetValidation($propertyName);
    }

    public function addResearcherField(): void
    {
        $this->researchers[] = '';
    }
    public function removeResearcherField($index): void
    {
        if (isset($this->researchers[$index])) {
            unset($this->researchers[$index]);
            $this->researchers = array_values($this->researchers);
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

            $abstract_pdf_path = null;
            if ($this->abstract) {
                $abstract_pdf_path = $this->abstract->store('uploads/thesis_abstracts', 'public');
            }

            $record = Record::create([
                'accession_number' => $this->accession_number,
                'title' => $this->title,
                'acquisition_status' => $this->acquisition_status,
                'condition' => $this->condition,
                'subject_headings' => $this->subject_headings,
            ]);

            $record->thesis()->create([
                'researchers' => $this->researchers,
                'adviser' => $this->adviser,
                'year' => $this->year,
                'month' => $this->month,
                'institution' => $this->institution,
                'college' =>  $this->college,
                'degree_program' => $this->degree_program,
                'degree_level' => $this->degree_level,
                'call_number' => $this->call_number,
                'ddc_class_id' => $this->ddc_class_id,
                'lc_class_id' => $this->lc_class_id,
                'physical_location_id' => $this->physical_location_id,
                'abstract' => $abstract_pdf_path,
            ]);

            $this->reset();
            $this->resetValidation();

            // create here

            session()->flash('success', 'Record created successfully.');
            return redirect()->route('thesis.index');

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

    public function render()
    {
        return view('livewire.records.thesis-create')
            ->layout('components.layouts.records', ['headingTitle' => 'Add Thesis/Dissertations']);
    }
}
