<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DeliveryDayModel;

class DeliveryDaySeeder extends Seeder
{
    public function run(): void
    {
        DeliveryDayModel::insert([
            ['name' => 'Senin', 'day_of_week' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Selasa', 'day_of_week' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Rabu', 'day_of_week' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kamis', 'day_of_week' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jumat', 'day_of_week' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sabtu', 'day_of_week' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Minggu', 'day_of_week' => 7, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
