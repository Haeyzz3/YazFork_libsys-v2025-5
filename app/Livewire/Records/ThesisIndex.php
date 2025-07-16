<?php

namespace App\Livewire\Records;

use App\Models\Record;
use Livewire\Component;
use Livewire\WithPagination;

class ThesisIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    public function render()
    {
        $records = Record::with('thesis')
            ->whereHas('thesis')
            ->when($this->search, function ($query) {
                $query->where('records.title', 'like', '%' . $this->search . '&')
                    ->orWhereHas('thesis', function ($query) {
                        $query->where('authors', 'like', '%' . $this->search . '%');
                    });
            })
            ->orderByDesc('created_at')
            ->paginate($this->perPage);

        return view('livewire.records.thesis-index', [
            'records' => $records,
        ])->layout('components.layouts.records', ['headingTitle' => 'Manage Thesis/Dissertations']);
    }
}
