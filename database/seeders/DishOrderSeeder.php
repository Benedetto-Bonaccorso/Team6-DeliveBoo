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
            'id_dish' => 1,
            'id_order' => 1,
            'quantity' => 2
        ]);
        DB::table('dish_order')->insert([
            'id_dish' => 2,
            'id_order' => 2,
            'quantity' => 3
        ]);
        DB::table('dish_order')->insert([
            'id_dish' => 4,
            'id_order' => 3,
            'quantity' => 1
        ]);
    }
}
