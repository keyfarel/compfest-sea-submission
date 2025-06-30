<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserModel;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userAhmad = UserModel::where('email', 'ahmad.k@example.com')->first();
        $userLina = UserModel::where('email', 'lina.w@example.com')->first();
        $userReza = UserModel::where('email', 'reza.m@example.com')->first();
        $userDewi = UserModel::where('email', 'dewi.s@example.com')->first();
        $userBudi = UserModel::where('email', 'budi.p@example.com')->first();

        $testimonials = [
            [
                'user_id' => $userAhmad->id,
                'name' => 'Ahmad K.',
                'location' => 'Bandung',
                'rating' => 5,
                'quote' => "I've tried several meal delivery services, but SEA Catering stands out for quality and taste. The food actually tastes homemade!",
            ],
            [
                'user_id' => $userLina->id,
                'name' => 'Lina T.',
                'location' => 'Yogyakarta',
                'rating' => 4,
                'quote' => "The vegetarian options are diverse and flavorful. I never feel like I'm missing out compared to the regular menu.",
            ],
            [
                'user_id' => $userReza->id,
                'name' => 'Reza M.',
                'location' => 'Medan',
                'rating' => 5,
                'quote' => "Great value for money. The portion sizes are generous and the ingredients are clearly fresh and high-quality.",
            ],
            [
                'user_id' => $userDewi->id,
                'name' => 'Dewi S.',
                'location' => 'Surabaya',
                'rating' => 5,
                'quote' => "As a busy professional, this service is a lifesaver. Healthy, delicious, and saves me so much time on meal prep.",
            ],
            [
                'user_id' => $userBudi->id,
                'name' => 'Budi P.',
                'location' => 'Jakarta',
                'rating' => 4,
                'quote' => "The athlete plan is perfect for my training needs. High protein and tastes great, which is a rare combination.",
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
