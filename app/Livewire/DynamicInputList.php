<?php

namespace App\Livewire;

use Livewire\Component;

class DynamicInputList extends Component
{
    public $items = [];
    public $type;
    public $label;
    public $placeholder;
    public $wireModelPrefix;

    public function mount($type, $label, $placeholder, $items = [], $wireModelPrefix)
    {
        $this->type = $type;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->items = $items;
        $this->wireModelPrefix = $wireModelPrefix;
    }

    public function addItem(): void
    {
        $this->items[] = '';
    }

    public function removeItem($index): void
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items);
    }

    public function render()
    {
        return view('livewire.dynamic-input-list');
    }
}
