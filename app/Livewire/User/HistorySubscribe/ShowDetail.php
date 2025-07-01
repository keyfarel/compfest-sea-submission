<?php

namespace App\Livewire\User\HistorySubscribe;

use App\Models\SubscriptionModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.dashboard.user.app')]
#[Title('Detail Langganan - SEA Catering')]
class ShowDetail extends Component
{
    public SubscriptionModel $subscription;

    public function mount($subscriptionId)
    {
        $this->subscription = Auth::user()
            ->subscriptions()
            ->with(['plan', 'statusHistories'])
            ->findOrFail($subscriptionId);
    }

    public function render()
    {
        return view('livewire.user.history-subscribe.show-detail');
    }
}
