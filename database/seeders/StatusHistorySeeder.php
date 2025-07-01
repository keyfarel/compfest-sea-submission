<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubscriptionModel;

class StatusHistorySeeder extends Seeder
{
    public function run(): void
    {
        $subscription = SubscriptionModel::first();

        if ($subscription) {
            $subscription->statusHistories()->create([
                'status' => 'dijeda',
                'notes' => 'Pengguna meminta jeda.',
            ]);

            $subscription->statusHistories()->create([
                'status' => 'aktif',
                'notes' => 'Langganan dilanjutkan.',
            ]);
        } else {
            echo "Tidak ada subscription untuk ditambahkan histori status.\n";
        }
    }
}
