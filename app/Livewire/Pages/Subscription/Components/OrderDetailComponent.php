<?php

namespace App\Livewire\Pages\Subscription\Components;

use Livewire\Component;

class OrderDetailComponent extends Component
{
    public $totalPrice = 0;

    // Properti $listeners untuk mendengarkan event dari komponen lain
    protected $listeners = ['summaryUpdated' => 'updateSummary'];

    // Method ini akan dipanggil ketika event 'summaryUpdated' diterima
    public function updateSummary($data)
    {
        $this->totalPrice = $data['totalPrice'] ?? 0;
    }

    public function render()
    {
        return view('livewire.pages.subscription.components.order-detail-component');
    }
}
