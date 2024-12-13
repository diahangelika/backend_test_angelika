<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        // $faker = Faker::create();
        // for ($i = 0; $i < 1000; $i++) {
        //     DB::table('table_author')->insert([
        //         'author_name' => $faker->name,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        $faker = Faker::create();
        foreach (range(1, 1000) as $index) {
            DB::table('authors')->insert([
                'author_name' => $faker->name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
