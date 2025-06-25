<?php

namespace App\Livewire\Pages\Menu\Components;

use Livewire\Component;

class MealPlanComponent extends Component
{
    public array $plans = [];

    public function mount()
    {
        $this->plans = [
            [
                'id' => 1,
                'name' => 'Basic Plan',
                'description' => 'Perfect for individuals looking to start their healthy eating journey.',
                'price_formatted' => 'Rp 599,000',
                'features' => [
                    '5 meals per week',
                    'Choice of lunch or dinner',
                ],
                'is_popular' => false,
                'details_url' => '#',
                'subscribe_url' => '#',
            ],
            [
                'id' => 2,
                'name' => 'Premium Plan',
                'description' => 'Our most popular option with complete meal coverage.',
                'price_formatted' => 'Rp 999,000',
                'features' => [
                    '10 meals per week',
                    'Choice of breakfast, lunch, or dinner',
                ],
                'is_popular' => true,
                'details_url' => '#',
                'subscribe_url' => '#',
            ],
            [
                'id' => 3,
                'name' => 'Family Plan',
                'description' => 'Designed for families who want to eat healthy together.',
                'price_formatted' => 'Rp 1,899,000',
                'features' => [
                    '20 meals per week',
                    'Family-style portions',
                ],
                'is_popular' => false,
                'details_url' => '#',
                'subscribe_url' => '#',
            ],
            [
                'id' => 4,
                'name' => 'Weight Loss Plan',
                'description' => 'Specially designed for those on a weight loss journey.',
                'price_formatted' => 'Rp 799,000',
                'features' => [
                    '7 meals per week',
                    'Calorie-controlled portions',
                ],
                'is_popular' => false,
                'details_url' => '#',
                'subscribe_url' => '#',
            ],
            [
                'id' => 5,
                'name' => 'Athlete Plan',
                'description' => 'High-protein meals for active individuals and athletes.',
                'price_formatted' => 'Rp 1,299,000',
                'features' => [
                    '14 meals per week',
                    'High-protein portions',
                ],
                'is_popular' => false,
                'details_url' => '#',
                'subscribe_url' => '#',
            ],
            [
                'id' => 6,
                'name' => 'Vegetarian Plan',
                'description' => 'Plant-based meals packed with nutrients and flavor.',
                'price_formatted' => 'Rp 699,000',
                'features' => [
                    '7 vegetarian meals per week',
                    'Diverse plant-based proteins',
                ],
                'is_popular' => false,
                'details_url' => '#',
                'subscribe_url' => '#',
            ],
        ];
    }

    public function render()
    {
        return view('livewire.pages.menu.components.meal-plan-component');
    }
}
