<?php

namespace App\Livewire\User\HistorySubscribe;

use App\Models\SubscriptionModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.dashboard.user.app')]
#[Title('User Dashboard - SEA Catering')]
class Index extends Component
{
    use WithPagination;

    public bool $showDetailModal = false;
    public ?SubscriptionModel $selectedSubscription = null;

    public function showDetail($subscriptionId)
    {
        $this->selectedSubscription = Auth::user()
            ->subscriptions()
            ->with('statusHistories')
            ->find($subscriptionId);

        $this->showDetailModal = true;
    }

    public function render()
    {
        $subscriptions = Auth::user()
            ->subscriptions()
            ->with('plan')
            ->latest()
            ->paginate(5);

        return view('livewire.user.history-subscribe.index', [
            'subscriptions' => $subscriptions
        ]);
    }
}
