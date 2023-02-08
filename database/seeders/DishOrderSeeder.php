<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DishOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dish_order')->insert([
            'dish_id' => 1,
            'order_id' => 1,
            'quantity' => 2
        ]);
        DB::table('dish_order')->insert([
            'dish_id' => 2,
            'order_id' => 2,
            'quantity' => 3
        ]);
        DB::table('dish_order')->insert([
            'dish_id' => 4,
            'order_id' => 3,
            'quantity' => 1
        ]);
    }
}
