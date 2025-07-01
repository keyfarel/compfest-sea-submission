<?php

namespace App\Console\Commands;

use App\Models\SubscriptionModel;
use Illuminate\Console\Command;

class CheckPausedSubscriptions extends Command
{
    protected $signature = 'subscriptions:check-paused';
    protected $description = 'Reactivates subscriptions whose pause period has ended.';

    public function handle()
    {
        $this->info('Mulai memeriksa langganan yang dijeda...');
        $pausedSubscriptions = SubscriptionModel::where('latest_status', 'dijeda')->get();

        foreach ($pausedSubscriptions as $subscription) {
            $latestPause = $subscription->latestPauseHistory;

            if ($latestPause && $latestPause->pause_end_date->isPast()) {
                $this->info("Mengaktifkan kembali langganan ID: #{$subscription->id}");

                $subscription->statusHistories()->create([
                    'status' => 'aktif',
                    'notes' => 'Langganan diaktifkan kembali secara otomatis setelah masa jeda berakhir.'
                ]);
            }
        }

        $this->info('Pemeriksaan selesai.');
        return Command::SUCCESS;
    }
}
