<?php

namespace App\Livewire\Pages\Menu;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.app.app')]
#[Title('Menu - SEA Catering')]
class Menu extends Component
{
    public function render()
    {
        return view('livewire.pages.menu.menu');
    }
}
