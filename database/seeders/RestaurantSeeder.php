<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = [
            'Da Mario'   => ["018-7547891", "12345678901", "Via Loreto 58", "", 1],
            'Taiwan'     => ["821-6498569", "12888878901", "Viale Italia 310", "", 2],
            'Da Luigi'   => ["966-7422843", "12555578901", "Via Repubblica 11", "", 3],
        ];

        foreach ($restaurants as $key => $restaurant) {
            $newrestaurant = new Restaurant();
            $newrestaurant->name = $key;
            $newrestaurant->slug = Str::slug($newrestaurant->name);
            $newrestaurant->phone_number = $restaurant[0];
            $newrestaurant->piva = $restaurant[1];
            $newrestaurant->address = $restaurant[2];
            $newrestaurant->cover_image = $restaurant[3];
            $newrestaurant->user_id = $restaurant[4];
            $newrestaurant->save();
        }
    }
}
