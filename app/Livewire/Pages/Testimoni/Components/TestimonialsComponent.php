<?php

namespace App\Livewire\Pages\Testimoni\Components;

use Livewire\Component;

class TestimonialsComponent extends Component
{
    public array $testimonials = [];

    public function mount()
    {
        $this->testimonials = [
            [
                'name' => 'Ahmad K.',
                'location' => 'Bandung',
                'rating' => 5,
                'quote' => '"I\'ve tried several meal delivery services, but SEA Catering stands out for quality and taste. The food actually tastes homemade!"',
            ],
            [
                'name' => 'Lina T.',
                'location' => 'Yogyakarta',
                'rating' => 4,
                'quote' => '"The vegetarian options are diverse and flavorful. I never feel like I\'m missing out compared to the regular menu."',
            ],
            [
                'name' => 'Reza M.',
                'location' => 'Medan',
                'rating' => 5,
                'quote' => '"Great value for money. The portion sizes are generous and the ingredients are clearly fresh and high-quality."',
            ],
            [
                'name' => 'Dewi S.',
                'location' => 'Surabaya',
                'rating' => 5,
                'quote' => '"As a busy professional, this service is a lifesaver. Healthy, delicious, and saves me so much time on meal prep."',
            ],
            [
                'name' => 'Budi P.',
                'location' => 'Jakarta',
                'rating' => 4,
                'quote' => '"The athlete plan is perfect for my training needs. High protein and tastes great, which is a rare combination."',
            ],
        ];
    }

    public function render()
    {
        return view('livewire.pages.testimoni.components.testimonials-component');
    }
}
