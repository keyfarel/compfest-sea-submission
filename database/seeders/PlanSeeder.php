<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlanModel;

class PlanSeeder extends Seeder
{
    public function run(): void
    {
        PlanModel::insert([
            [
                'name' => 'Diet Plan',
                'slug' => 'diet',
                'description' => 'Low-calorie meals designed for weight management',
                'price' => 30000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Protein Plan',
                'slug' => 'protein',
                'description' => 'High-protein meals ideal for active lifestyles',
                'price' => 40000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Royal Plan',
                'slug' => 'royal',
                'description' => 'Premium gourmet meals with exclusive ingredients',
                'price' => 60000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
