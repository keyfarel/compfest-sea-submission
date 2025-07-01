<?php

namespace App\Livewire\Pages\Subscription;

use Livewire\Component;
use Livewire\Attributes\On;

class OrderDetail extends Component
{
    public $planName = null;
    public $planPrice = 0;
    public $mealCount = 0;
    public $dayCount = 0;
    public $totalPrice = 0;

    #[On('summaryUpdated')]
    public function updateSummary($data)
    {
        $this->planName = $data['planName'] ?? null;
        $this->planPrice = $data['planPrice'] ?? 0;
        $this->mealCount = $data['mealCount'] ?? 0;
        $this->dayCount = $data['dayCount'] ?? 0;
        $this->totalPrice = $data['totalPrice'] ?? 0;
    }

    public function render()
    {
        return view('livewire.pages.subscription.order-detail');
    }
}
