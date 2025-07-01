<?php

namespace App\Livewire\User;

use App\Models\SubscriptionModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.dashboard.user.app')]
#[Title('User Dashboard - SEA Catering')]
class Dashboard extends Component
{
    public ?SubscriptionModel $subscription;

    public int $totalSubscriptions = 0;
    public int $activeSubscriptions = 0;
    public int $pausedSubscriptions = 0;
    public int $cancelledSubscriptions = 0;

    public bool $showPauseModal = false;
    public $pauseStartDate;
    public $pauseEndDate;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $allSubscriptions = Auth::user()->subscriptions()->get();

        $this->totalSubscriptions = $allSubscriptions->count();
        $this->activeSubscriptions = $allSubscriptions->where('latest_status', 'aktif')->count();
        $this->pausedSubscriptions = $allSubscriptions->where('latest_status', 'dijeda')->count();
        $this->cancelledSubscriptions = $allSubscriptions->where('latest_status', 'dibatalkan')->count();

        $this->subscription = $allSubscriptions->sortByDesc('created_at')->first();

        if ($this->subscription) {
            $this->subscription->load(['plan', 'deliveryDays', 'mealTypes', 'latestPauseHistory']);
        }
    }

    public function openPauseModal()
    {
        $this->pauseStartDate = Carbon::today()->format('Y-m-d');
        $this->pauseEndDate = null;
        $this->showPauseModal = true;
    }

    public function confirmPause()
    {
        if (!$this->subscription || $this->subscription->latest_status !== 'aktif') return;

        $validated = $this->validate([
            'pauseStartDate' => 'required|date|after_or_equal:today',
            'pauseEndDate' => 'required|date|after:pauseStartDate',
        ]);

        $this->subscription->statusHistories()->create([
            'status' => 'dijeda',
            'notes' => 'Langganan dijeda oleh pengguna.',
            'pause_start_date' => $validated['pauseStartDate'],
            'pause_end_date' => $validated['pauseEndDate'],
        ]);

        $this->showPauseModal = false;
        $this->loadData();
    }

    public function resume()
    {
        if ($this->subscription && $this->subscription->latest_status === 'dijeda') {
            $this->subscription->statusHistories()->create(['status' => 'aktif', 'notes' => 'Diaktifkan kembali oleh pengguna.']);
            $this->loadData();
        }
    }

    public function cancel()
    {
        if ($this->subscription && in_array($this->subscription->latest_status, ['aktif', 'dijeda'])) {
            $this->subscription->statusHistories()->create(['status' => 'dibatalkan', 'notes' => 'Dibatalkan oleh pengguna.']);
            $this->loadData();
        }
    }

    public function render()
    {
        return view('livewire.user.dashboard');
    }
}
