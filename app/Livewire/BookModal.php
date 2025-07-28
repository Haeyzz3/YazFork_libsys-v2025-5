<?php

namespace App\Livewire;

use Livewire\Component;

class BookModal extends Component
{
    public $showModal = false;
    public $book = [];

    protected $listeners = ['showBookModal' => 'show'];

    public function show($book)
    {
        $this->book = $book;
        $this->showModal = true;
    }

    public function close()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.book-modal');
    }
}
