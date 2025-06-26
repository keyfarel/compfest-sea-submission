<?php

namespace App\Livewire\Pages\Subscription\Components;

use Livewire\Component;

class FormComponent extends Component
{
    public $fullName = '';
    public $phoneNumber = '';
    public $allergies = '';
    public $plans = [];
    public $selectedPlan = null;
    public $mealTypes = [];
    public $deliveryDays = [];

    protected $rules = [
        'fullName' => 'required|string|min:3',
        'phoneNumber' => 'required|string|numeric',
        'selectedPlan' => 'required|in:diet,protein,royal',
        'mealTypes' => 'required|array|min:1',
        'deliveryDays' => 'required|array|min:1',
        'allergies' => 'nullable|string',
    ];

    public function mount()
    {
        $this->plans = [
            'diet' => [
                'name' => 'Diet Plan',
                'price' => 30000,
                'description' => 'Low-calorie meals designed for weight management',
            ],
            'protein' => [
                'name' => 'Protein Plan',
                'price' => 40000,
                'description' => 'High-protein meals ideal for active lifestyles',
            ],
            'royal' => [
                'name' => 'Royal Plan',
                'price' => 60000,
                'description' => 'Premium gourmet meals with exclusive ingredients',
            ],
        ];

        $this->calculateAndDispatchSummary();
    }

    public function updated($property)
    {
        if (in_array($property, ['selectedPlan', 'mealTypes', 'deliveryDays'])) {
            $this->calculateAndDispatchSummary();
        }
    }

    public function calculateAndDispatchSummary()
    {
        $totalPrice = 0;

        if (!empty($this->selectedPlan) && !empty($this->mealTypes) && !empty($this->deliveryDays)) {
            $planPrice = $this->plans[$this->selectedPlan]['price'] ?? 0;
            $mealCount = count($this->mealTypes);
            $dayCount = count($this->deliveryDays);

            $totalPrice = $planPrice * $mealCount * $dayCount * 4;
        }

        $this->dispatch('summaryUpdated', [
            'totalPrice' => $totalPrice,
        ]);
    }

    public function submit()
    {
        $validatedData = $this->validate();

        // Simpan ke database sesuai kebutuhan...
        // Contoh: Subscription::create($validatedData);

        session()->flash('success', 'Your subscription has been placed successfully!');

        $this->reset();
        $this->mount(); // inisialisasi ulang
    }

    public function render()
    {
        return view('livewire.pages.subscription.components.form-component');
    }
}
