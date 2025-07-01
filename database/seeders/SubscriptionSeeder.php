<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubscriptionModel;
use App\Models\UserModel;
use App\Models\PlanModel;

class SubscriptionSeeder extends Seeder
{
    public function run(): void
    {
        $user = UserModel::where('role_id', 2)->first();
        $proteinPlan = PlanModel::where('slug', 'protein')->first();

        if ($user && $proteinPlan) {
            $subscription = SubscriptionModel::create([
                'user_id' => $user->id,
                'plan_id' => $proteinPlan->id,
                'full_name' => $user->name,
                'phone_number' => '081234567890',
                'allergies' => 'Tidak ada alergi udang.',
                'monthly_total_price' => 2400000,
                'start_date' => now()->addDays(3),
            ]);

            $subscription->statusHistories()->create([
                'status' => 'aktif',
                'notes' => 'Langganan dibuat melalui seeder'
            ]);

            $subscription->mealTypes()->attach([2, 3]);
            $subscription->deliveryDays()->attach([1, 3, 5]);
        }
    }
}
