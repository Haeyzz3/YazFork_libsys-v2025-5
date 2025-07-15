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

    // create here

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
