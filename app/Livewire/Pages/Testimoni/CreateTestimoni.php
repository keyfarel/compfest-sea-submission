<?php

namespace App\Livewire\Pages\Testimoni;

use App\Models\TestimonialModel;
use Livewire\Component;
use Livewire\Attributes\Rule;

class CreateTestimoni extends Component
{
    #[Rule('required|string|max:255')]
    public string $name = '';

    #[Rule('nullable|string|max:255')]
    public string $location = '';

    #[Rule('required|integer|min:1|max:5')]
    public int $rating = 0;

    #[Rule('required|string|min:10|max:150')]
    public string $review = '';

    public function mount()
    {
        if (auth()->check()) {
            $this->name = auth()->user()->name;
        }
    }

    public function save()
    {
        if (auth()->guest()) {
            session()->flash('info', 'You must be logged in to submit a review. Redirecting now...');
            $this->js("setTimeout(() => { Livewire.navigate('" . route('login') . "'); }, 2000)");
            return;
        }

        if (auth()->user()->role_id == 1) {
            session()->flash('error', 'Sorry, administrators are not allowed to submit reviews.');
            return;
        }

        $validatedData = $this->validate();

        TestimonialModel::create([
            'user_id' => auth()->id(),
            'name' => $validatedData['name'],
            'location' => $validatedData['location'] ?: null,
            'rating' => $validatedData['rating'],
            'quote' => $validatedData['review'],
        ]);

        session()->flash('success', 'Thank you for your review! It has been submitted successfully.');

        $this->reset(['location', 'rating', 'review']);
        $this->js("setTimeout(() => { window.location.reload(); }, 2000)");
    }

    public function render()
    {
        return view('livewire.pages.testimoni.create-testimoni');
    }
}
