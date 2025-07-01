<?php

namespace App\Livewire\Admin\ManageSubscribe;

use App\Models\SubscriptionModel;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.dashboard.admin.app')]
#[Title('Admin | Manage Subscribe - SEA Catering')]
class Index extends Component
{
    public function activate($subscriptionId)
    {
        $subscription = SubscriptionModel::find($subscriptionId);
        if ($subscription && $subscription->latest_status === 'pending') {
            $subscription->statusHistories()->create([
                'status' => 'aktif',
                'notes' => 'Pembayaran dikonfirmasi manual oleh admin ' . auth()->user()->name
            ]);

            session()->flash('success', 'Langganan #' . $subscription->id . ' berhasil diaktifkan.');
        }
    }

    public function render()
    {
        $pendingSubscriptions = SubscriptionModel::with('user', 'plan')
            ->where('latest_status', 'pending')
            ->latest()
            ->get();

        return view('livewire.admin.manage-subscribe.index', [
            'pendingSubscriptions' => $pendingSubscriptions
        ]);
    }
}
