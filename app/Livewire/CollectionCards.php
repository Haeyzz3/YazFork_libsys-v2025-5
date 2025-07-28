<?php

namespace App\Livewire;

use Livewire\Component;

class CollectionCards extends Component
{
    public $collections = [
        [
            'title' => 'Browse Collection',
            'hoverTitle' => 'Start Browsing',
            'description' => 'Explore our extensive collection of books, journals, and resources.',
            'icon' => 'fas fa-book-open',
            'count' => '25,689',
            'hoverClass' => 'group-hover:text-gray-700',
            'hoverTitleClass' => 'group-hover:text-gray-700',
        ],
        [
            'title' => 'New Arrivals',
            'hoverTitle' => 'See What\'s New',
            'description' => 'Discover our latest additions to the library collection.',
            'icon' => 'fas fa-star',
            'count' => '1,245',
            'hoverClass' => 'group-hover:text-yellow-500',
            'hoverTitleClass' => 'group-hover:text-yellow-500'
        ],
        [
            'title' => 'Top Picks',
            'hoverTitle' => 'Most Popular',
            'description' => 'Most popular books among students and faculty.',
            'icon' => 'fas fa-thumbs-up',
            'count' => '892',
            'hoverClass' => 'group-hover:text-gray-300',
            'hoverTitleClass' => 'group-hover:text-gray-400'
        ]
    ];

    public function showCardModal($title, $description, $icon, $count)
    {
        $this->dispatchBrowserEvent('show-card-modal', [
            'title' => $title,
            'description' => $description,
            'icon' => $icon,
            'count' => $count
        ]);
    }

    public function render()
    {
        return view('livewire.collection-cards');
    }
}
