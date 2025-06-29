<?php

namespace App\Livewire\Pages\Subscription;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.app.app')]
#[Title('Subscription - SEA Catering')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.pages.subscription.index');
    }
}
