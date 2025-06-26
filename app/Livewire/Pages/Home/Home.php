<?php

namespace App\Livewire\Pages\Home;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.app.app')]
#[Title('Home - SEA Catering')]
class Home extends Component
{
    public function render()
    {
        return view('livewire.pages.home.home');
    }
}
