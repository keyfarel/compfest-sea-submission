<?php

namespace App\Livewire\Pages\Testimoni;

use App\Models\TestimonialModel;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class ShowTestimoni extends Component
{
    public Collection  $testimonials;

    public function mount()
    {
        $this->testimonials = TestimonialModel::orderBy('rating', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.pages.testimoni.show-testimoni');
    }
}
