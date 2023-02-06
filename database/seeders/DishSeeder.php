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
        $dishes = [ 'Spaghetti alle Vongole'   =>["Spaghetti alle vongole freschissime",13.50,true,""],
                    'Hot Dog'   =>["Panino ripieno di tacchino pregiato",4.5,true,""],
                    'Margherita'   =>["Pomodoro, Mozzarella",4.5,true,""],
                    'Capricciosa'   =>["Pomodoro, Mozzarella, Funghi, Carciofini,Prosciutto Cotto",4.5,true,""],
                    'Osso Buco'   =>["Osso Buco in cottura lenta",18,false,""]
                   ];

        foreach ($dishes as $key=> $dish) {
            $newdish = new Dish();
            $newdish->name = $key;
            $newdish->slug = Str::slug($newdish->name);
            $newdish->description = $dish[0];
            $newdish->price = $dish[1];
            $newdish->visible = $dish[2];
            $newdish->cover_image = $dish[3];
            $newdish->save();

        }
    }
}