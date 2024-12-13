<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BooklistSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i <= 100000; $i++) {
            DB::table('books')->insert([
                'book_name' => $faker->sentence(3),
                'category_id' => $faker->numberBetween(1, 3000),
                'author_id' => $faker->numberBetween(1, 1000),
                // 'average_rating' => $faker->randomFloat(2, 1, 10),
                // 'voter' => rand(1, 1000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
