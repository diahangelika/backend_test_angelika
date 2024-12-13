<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RatingsSeeder extends Seeder
{
    public function run(): void
    {
        // $faker = Faker::create();

        // for ($i = 0; $i <= ceil(500000 / 3000); $i++) {
        //     DB::table('ratings')->insert([
        //         'book_id' => $faker->numberBetween(1, 100000),
        //         'rating' => $faker->numberBetween(1, 10),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        $faker = Faker::create();
        foreach (range(1, 500000) as $index) {
            DB::table('ratings')->insert([
                'book_id' => $faker->numberBetween(1, 100000),
                'rating' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
