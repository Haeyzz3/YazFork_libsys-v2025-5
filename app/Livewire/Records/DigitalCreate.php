<?php

namespace App\Livewire\Records;

use Livewire\Component;
use Livewire\WithFileUploads;

class DigitalCreate extends Component
{
    use WithFileUploads;

    // select options
    public $languages = [
        'english' => 'English',
        'filipino' => 'Filipino',
        'cebuano' =>  'Cebuano',
    ];
    public $collection_types = [
        'cd' => 'CD',
        'duplicate_copy' => 'Duplicate Copy',
        'cassette' => 'Cassette',
        'vhs' => 'VHS',
        'cdr' => 'CDR',
    ];
    public $sources = [
        'donation' => 'Donation',
        'purchase' => 'Purchase'
    ];
    public $acquisition_statuses = [
        'available' => 'Available',
        'pending_review' => 'Pending Review',
        'processing' => 'Processing',
    ];
    public $conditions = [
        'excellent' => 'Available',
        'good' => 'Good',
        'fair' => 'Fair',
        'poor' => 'Poor',
        'damaged' => 'Damaged',
    ];

    // initialization
    public $accession_number = '';
    public $title = '';
    public $authors = [''];
    public $editors = [''];
    public $publication_year = '';
    public $copyright_year = '';
    public $publisher = '';
    public $language = '';
    public $collection_type = '';
    public $duration = '';
    public $cover_image = '';
    public $source = '';
    public $purchase_amount = '';
    public $lot_cost = '';
    public $supplier = '';
    public $donated_by = '';
    public $acquisition_status = '';
    public $condition = '';
    public $overview = '';
    public $subject_headings = [''];

    public function rules()
    {
        return [
            // Records fields
            'title' => 'required|string|max:255',
            'accession_number' => 'required|string|max:50|unique:records,accession_number',
            'acquisition_status' => 'nullable|string|max:50',
            'condition' => 'nullable|string|max:100',
            'subject_headings.*' => 'string|max:100',

            // Books fields
            'authors.*' => 'string|max:100',
            'editors.*' => 'string|max:100',
            'publication_year' => 'nullable|integer|min:1000|max:' . now()->year,
            'copyright_year' => 'nullable|integer|min:1000|max:' . now()->year,
            'publisher' => 'nullable|string|max:255',
            'language' => 'nullable|string|max:100',
            'collection_type' => 'nullable|string|max:100',
            'duration' => 'nullable|string|max:50',
            'cover_image' => 'nullable|image|max:2048',
            'source' => 'nullable|string|max:100',
            'purchase_amount' => 'nullable|numeric|min:0',
            'lot_cost' => 'nullable|numeric|min:0',
            'supplier' => 'nullable|string|max:255',
            'donated_by' => 'nullable|string|max:255',
            'overview' => 'nullable|string',
        ];
    }

    // Livewire lifecycle hook that is automatically triggered whenever a property (field) bound to the component is updated in the frontend (e.g., when a user types in an input field).
    public function updated($propertyName) : void
    {
        $this->validateOnly($propertyName);
        $this->resetValidation($propertyName);
    }

    // create here
    public function submit()
    {
        try {

            $this->validate();

        } catch (\Illuminate\Database\QueryException $e) {
            // Handle database-specific errors
            $message = app()->environment('production')
                ? 'Failed to add multimedia. Please try again.'
                : 'Failed to add multimedia: ' . $e->getMessage();
            session()->flash('error', $message);
        } catch (\Exception $e) {
            // Handle any other unexpected errors
            $message = app()->environment('production')
                ? 'An unexpected error occurred. Please try again.'
                : 'An unexpected error occurred: ' . $e->getMessage();
            session()->flash('error', $message);
        }
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
        if (isset($this->additional_authors[$index])) {
            unset($this->subject_headings[$index]);
            $this->subject_headings = array_values($this->subject_headings);
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
        return view('livewire.records.digital-create')->layout('components.layouts.records', ['headingTitle' => 'Add Multimedia']);
    }
}
