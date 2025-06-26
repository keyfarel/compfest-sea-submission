<?php

namespace App\Livewire\Pages\Subscription;

use Livewire\Component;

class OrderDetail extends Component
{
    public $totalPrice = 0;
    protected $listeners = ['summaryUpdated' => 'updateSummary'];

    public function updateSummary($data)
    {
        $this->totalPrice = $data['totalPrice'] ?? 0;
    }

    public function render()
    {
        return view('livewire.pages.subscription.order-detail');
    }
}
