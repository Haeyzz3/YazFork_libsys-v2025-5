<?php

namespace App\Livewire\Records;

use App\Models\Record;
use Livewire\Component;
use Livewire\WithPagination;

class PeriodicalIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    public function render()
    {
        $records = Record::with('periodical')
            ->whereHas('periodical')
            ->when($this->search, function ($query) {
                $query->where('records.title', 'like', '%' . $this->search . '&')
                    ->orWhereHas('periodical', function ($query) {
                        $query->where('authors', 'like', '%' . $this->search . '%');
                    });
            })
            ->orderByDesc('created_at')
            ->paginate($this->perPage);

        return view('livewire.records.periodical-index', [
            'records' => $records,
        ])->layout('components.layouts.records', ['headingTitle' => 'Manage Periodicals/Magazines']);
    }
}
