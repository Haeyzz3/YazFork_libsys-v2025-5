<?php

namespace App\Livewire\Records;

use App\Models\Record;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class BooksIndex extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search = '';
    public $perPage = 10; // Adjust as needed
    public $import_csv;

    public function updatingSearch(): void
    {
        $this->resetPage(); // Reset pagination when search changes
    }

    // for modal
    public $isModalOpen = false;
    public function openModal()
    {
        $this->isModalOpen = true;
    }
    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function rules()
    {
        return [
//            'import_csv' => 'date',
            'import_csv' => 'required|file|mimes:csv,txt|max:2048',
        ];
    }

    public function submit() {

        try {

            $this->validate();

            $csv_path = null;
            if ($this->import_csv) {
                $csv_path = $this->import_csv->store('uploads/book_csv_imports', 'public');
            }

            // import here


            // Reset the file input after saving
            $this->reset();
            $this->resetValidation();

            session()->flash('success', 'Record imported successfully!');

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

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        $records = Record::with('book')
            ->whereHas('book')
            ->when($this->search, function ($query) {
                $query->where('accession_number', 'like', '%' . $this->search . '%')
                    ->orWhere('title', 'like', '%' . $this->search . '%')
                    ->orWhere('ddc_classification', 'like', '%' . $this->search . '%')
                    ->orWhereHas('book', function ($query) {
                        $query->where('author', 'like', '%' . $this->search . '%');
                    })->orWhereHas('book', function ($query) {
                        $query->where('publication_year', 'like', '%' . $this->search . '%');
                    });
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.records.books-index', [
            'records' => $records,
        ])->layout('components.layouts.records', ['headingTitle' => 'Manage Books']);
    }
}
