<?php

namespace App\Livewire\Pages\Menu\Components;

use Livewire\Component;

class FilterComponent extends Component
{
    public array $categories = [];
    public string $activeCategory = 'all';

    public function mount()
    {
        $this->categories = [
            ['key' => 'all', 'name' => 'All'],
            ['key' => 'individual', 'name' => 'Individual'],
            ['key' => 'family', 'name' => 'Family'],
            ['key' => 'specialized', 'name' => 'Specialized'],
        ];
    }

    public function selectCategory($categoryKey)
    {
        $this->activeCategory = $categoryKey;
        $this->dispatch('filterByCategory', $categoryKey);
    }

    public function render()
    {
        return view('livewire.pages.menu.components.filter-component');
    }
}
