<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish;
use Illuminate\Support\Str;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishes = [
            'Spaghetti alle Vongole'   => [1, 2, "Spaghetti alle vongole freschissime", 13.50, true, ""],
            'Hot Dog'   => [3, 10, "Panino ripieno di tacchino pregiato", 4.5, true, ""],
            'Margherita'   => [2, 4, "Pomodoro, Mozzarella", 4.5, true, ""],
            'Capricciosa'   => [3, 4, "Pomodoro, Mozzarella, Funghi, Carciofini,Prosciutto Cotto", 4.5, true, ""],
            'Osso Buco'   => [1, 3, "Osso Buco in cottura lenta", 18, false, ""]
        ];

        foreach ($dishes as $key => $dish) {
            $newdish = new Dish();
            $newdish->name = $key;
            $newdish->slug = Str::slug($newdish->name);
            $newdish->id_restaurant = $dish[0];
            $newdish->id_category = $dish[1];
            $newdish->description = $dish[2];
            $newdish->price = $dish[3];
            $newdish->visible = $dish[4];
            $newdish->cover_image = $dish[5];
            $newdish->save();
        }
    }
}
