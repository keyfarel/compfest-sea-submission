<?php

namespace App\Livewire\Pages\Menu\Components;

use Livewire\Component;

class MealPlanComponent extends Component
{
    public array $plans = [];
    public string $activeFilter = 'all';
    public ?array $selectedPlan = null; // Untuk menyimpan data plan yang diklik
    public bool $showDetailModal = false; // Untuk kontrol buka/tutup modal

    protected $listeners = ['filterByCategory' => 'applyFilter'];

    public function mount()
    {
        $this->plans = [
            [
                'id' => 1,
                'name' => 'Basic Plan',
                'description' => 'Perfect for individuals looking to start their healthy eating journey.',
                'long_description' => 'Our Basic Plan provides 5 nutritious meals per week, carefully crafted by our expert chefs using fresh, locally-sourced ingredients. Each meal is portion-controlled and nutritionally balanced to support your health goals.',
                'included_meals' => [
                    '5 meals per week',
                    'Choice of lunch or dinner',
                    'Standard portion sizes',
                ],
                'extra_features' => [
                    'Nutritional information provided',
                    'Weekly menu rotation',
                    'Delivery twice a week',
                ],
                'price_formatted' => 'Rp 599,000',
                'features' => ['5 meals per week', 'Choice of lunch or dinner'],
                'is_popular' => false,
                'details_url' => '#',
                'subscribe_url' => '#',
                'category' => 'individual',
                'image_url' => asset('storage/menu/basic-plan.webp'),
            ],
            [
                'id' => 2,
                'name' => 'Premium Plan',
                'description' => 'Our most popular option with complete meal coverage.',
                'long_description' => 'The Premium Plan offers 10 meals per week, giving you more variety and flexibility. Choose from our expanded menu of chef-created recipes, with options for breakfast, lunch, and dinner. All meals are customizable to meet your dietary preferences.',
                'included_meals' => [
                    '10 meals per week',
                    'Choice of breakfast, lunch, or dinner',
                    'Customizable portion sizes',
                ],
                'extra_features' => [
                    'Detailed nutritional breakdown',
                    'Dietary preference customization',
                    'Delivery three times a week',
                    'Priority customer support',
                ],
                'price_formatted' => 'Rp 999,000',
                'features' => ['10 meals per week', 'Choice of breakfast, lunch, or dinner'],
                'is_popular' => true,
                'details_url' => '#',
                'subscribe_url' => '#',
                'category' => 'individual',
                'image_url' => asset('storage/menu/premium-plan.webp'),
            ],

            [
                'id' => 3,
                'name' => 'Family Plan',
                'description' => 'Designed for families who want to eat healthy together.',
                'long_description' => 'Our Family Plan provides 20 meals per week, perfect for households of 3-4 people. Enjoy family-style meals that are both nutritious and delicious, with options that appeal to both adults and children. Each meal comes with easy reheating instructions.',
                'included_meals' => [
                    '20 meals per week',
                    'Family-style portions',
                    'Kid-friendly options available',
                ],
                'extra_features' => [
                    'Nutritional information for all family members',
                    'Allergen-free options available',
                    'Flexible delivery schedule',
                    'Reusable container program',
                ],
                'price_formatted' => 'Rp 1,899,000',
                'features' => ['20 meals per week', 'Family-style portions'],
                'is_popular' => false,
                'details_url' => '#',
                'subscribe_url' => '#',
                'category' => 'family',
                'image_url' => asset('storage/menu/family-plan.webp'),
            ],
            [
                'id' => 4,
                'name' => 'Weight Loss Plan',
                'description' => 'Specially designed for those on a weight loss journey.',
                'long_description' => 'The Weight Loss Plan features 7 calorie-controlled meals per week, designed by nutritionists to support healthy weight management. Each meal is high in protein and fiber while being low in calories, helping you feel satisfied while meeting your goals.',
                'included_meals' => [
                    '7 meals per week',
                    'Calorie-controlled portions',
                    'High protein options',
                ],
                'extra_features' => [
                    'Detailed calorie and macronutrient breakdown',
                    'Weekly progress tracking',
                    'Nutritionist consultation included',
                    'Snack options available',
                ],
                'price_formatted' => 'Rp 799,000',
                'features' => ['7 meals per week', 'Calorie-controlled portions'],
                'is_popular' => false,
                'details_url' => '#',
                'subscribe_url' => '#',
                'category' => 'specialized',
                'image_url' => asset('storage/menu/weight-loss-plan.webp'),
            ],
            [
                'id' => 5,
                'name' => 'Athlete Plan',
                'description' => 'High-protein meals for active individuals and athletes.',
                'long_description' => 'Our Athlete Plan provides 14 protein-rich meals per week, specifically formulated to support muscle recovery and growth. Perfect for active individuals, fitness enthusiasts, and athletes who need proper nutrition to fuel their performance and recovery.',
                'included_meals' => [
                    '14 meals per week',
                    'High-protein portions',
                    'Pre and post-workout meal options',
                ],
                'extra_features' => [
                    'Macronutrient-optimized meals',
                    'Performance nutrition consultation',
                    'Flexible delivery times',
                    'Custom meal planning available',
                ],
                'price_formatted' => 'Rp 1,299,000',
                'features' => ['14 meals per week', 'High-protein portions'],
                'is_popular' => false,
                'details_url' => '#',
                'subscribe_url' => '#',
                'category' => 'specialized',
                'image_url' => asset('storage/menu/athlete-plan.webp'),
            ],
            [
                'id' => 6,
                'name' => 'Vegetarian Plan',
                'description' => 'Plant-based meals packed with nutrients and flavor.',
                'long_description' => 'The Vegetarian Plan offers 7 plant-based meals per week that never compromise on taste or nutrition. Our chefs use a variety of vegetables, legumes, grains, and plant proteins to create satisfying meals that provide all the nutrients you need.',
                'included_meals' => [
                    '7 vegetarian meals per week',
                    'Diverse plant-based proteins',
                    'Seasonal produce focus',
                ],
                'extra_features' => [
                    'Complete nutritional profile',
                    'Environmentally sustainable packaging',
                    'Organic ingredients when possible',
                    'Recipe cards included',
                ],
                'price_formatted' => 'Rp 699,000',
                'features' => ['7 vegetarian meals per week', 'Diverse plant-based proteins'],
                'is_popular' => false,
                'details_url' => '#',
                'subscribe_url' => '#',
                'category' => 'specialized',
                'image_url' => asset('storage/menu/vegetarian-plan.webp'),
            ],
        ];
    }

    public function applyFilter($category)
    {
        $this->activeFilter = $category;
    }

    public function showPlanDetails($planId)
    {
        // Cari plan berdasarkan ID
        $foundPlan = collect($this->plans)->firstWhere('id', $planId);

        if ($foundPlan) {
            $this->selectedPlan = $foundPlan;
            $this->showDetailModal = true;
        }
    }

    public function render()
    {
        $filteredPlans = $this->plans;

        if ($this->activeFilter !== 'all') {
            $filteredPlans = array_filter($this->plans, function ($plan) {
                return $plan['category'] === $this->activeFilter;
            });
        }

        return view('livewire.pages.menu.components.meal-plan-component', [
            'plansToShow' => $filteredPlans
        ]);
    }
}
