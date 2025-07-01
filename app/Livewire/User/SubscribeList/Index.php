<?php

namespace App\Livewire\User\SubscribeList;

use App\Models\SubscriptionModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.dashboard.user.app')]
#[Title('User Subscribe - SEA Catering')]
class Index extends Component
{
    public $subscriptions;

    public bool $showPauseModal = false;
    public $pauseStartDate;
    public $pauseEndDate;
    public ?SubscriptionModel $subscriptionToPause = null;

    public function mount()
    {
        $this->loadSubscriptions();
    }

    public function loadSubscriptions()
    {
        $this->subscriptions = Auth::user()
            ->subscriptions()
            ->with(['plan', 'deliveryDays', 'mealTypes', 'latestPauseHistory'])
            ->latest()
            ->get();
    }

    public function openPauseModal($subscriptionId)
    {
        $this->subscriptionToPause = $this->subscriptions->find($subscriptionId);
        $this->pauseStartDate = Carbon::today()->format('Y-m-d');
        $this->pauseEndDate = null;
        $this->showPauseModal = true;
    }

    public function confirmPause()
    {
        if (!$this->subscriptionToPause) return;

        $validated = $this->validate([
            'pauseStartDate' => 'required|date|after_or_equal:today',
            'pauseEndDate' => 'required|date|after:pauseStartDate',
        ]);

        $this->subscriptionToPause->statusHistories()->create([
            'status' => 'dijeda',
            'notes' => 'Langganan dijeda oleh pengguna.',
            'pause_start_date' => $validated['pauseStartDate'],
            'pause_end_date' => $validated['pauseEndDate'],
        ]);

        $this->showPauseModal = false;
        $this->loadSubscriptions();
    }

    public function resume($subscriptionId)
    {
        $subscription = $this->subscriptions->find($subscriptionId);
        if ($subscription && $subscription->latest_status === 'dijeda') {
            $subscription->statusHistories()->create([
                'status' => 'aktif',
                'notes' => 'Langganan diaktifkan kembali oleh pengguna.'
            ]);
            $this->loadSubscriptions();
        }
    }

    public function cancel($subscriptionId)
    {
        $subscription = $this->subscriptions->find($subscriptionId);
        if ($subscription && in_array($subscription->latest_status, ['aktif', 'dijeda'])) {
            $subscription->statusHistories()->create([
                'status' => 'dibatalkan',
                'notes' => 'Langganan dibatalkan oleh pengguna.'
            ]);
            $this->loadSubscriptions();
        }
    }

    public function render()
    {
        return view('livewire.user.subscribe-list.index');
    }
}
