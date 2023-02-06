<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Antipasti', 'Primi', 'Secondi','Pizze Rosse','Pizze Bianche','Pizze Speciali','Dolci','Bevande','Fritti','Panini','Sushi','Contorno'];

        foreach ($categories as $category) {
            $newcategory = new category();
            $newcategory->name = $category;
            $newcategory->slug = Str::slug($newcategory->name);
            $newcategory->save();
        }
    }
}