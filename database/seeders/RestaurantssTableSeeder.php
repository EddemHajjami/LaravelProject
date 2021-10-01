<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RestaurantssTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Restaurant::class, 5)->create();
    }
}
