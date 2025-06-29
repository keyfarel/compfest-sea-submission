<?php

namespace App\Livewire\Pages\Contact;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.app.app')]
#[Title('Contact - SEA Catering')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.pages.contact.index');
    }
}
