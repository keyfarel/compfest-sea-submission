<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MealTypeModel;

class MealTypeSeeder extends Seeder
{
    public function run(): void
    {
        MealTypeModel::insert([
            ['name' => 'Breakfast', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Lunch', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dinner', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
