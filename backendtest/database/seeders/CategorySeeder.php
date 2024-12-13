<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // $faker = Faker::create();
        // for ($i = 0; $i <= ceil(3000 / 1000); $i++) {
        //     DB::table('table_category')->insert([
        //         'category_name' => $faker->word,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        $faker = Faker::create();
        foreach (range(1, 3000) as $index) {
            DB::table('categories')->insert([
                'category_name' => $faker->word,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
