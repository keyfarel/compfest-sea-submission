<?php

namespace App\Livewire\Pages\Testimoni;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.app.app')]
#[Title('Testimonial - SEA Catering')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.pages.testimoni.index');
    }
}
