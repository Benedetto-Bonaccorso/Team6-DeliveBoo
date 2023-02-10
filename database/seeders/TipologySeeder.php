<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Tipology;

class TipologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipologies = [
            'Italian'   => ["", " Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus impedit magnam cum tempora aliquam ex, minus odit aliquid id eos."],
            'Chinese'     => ["", " Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus impedit magnam cum tempora aliquam ex, minus odit aliquid id eos."],
            'Mexican'  => ["", " Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus impedit magnam cum tempora aliquam ex, minus odit aliquid id eos."],
            'Vegan'     => ["", " Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus impedit magnam cum tempora aliquam ex, minus odit aliquid id eos."],
            'Japanese' => ["", " Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus impedit magnam cum tempora aliquam ex, minus odit aliquid id eos."],
            'Gluten-free'    => ["", " Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus impedit magnam cum tempora aliquam ex, minus odit aliquid id eos."],
            'Indian'    => ["", " Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus impedit magnam cum tempora aliquam ex, minus odit aliquid id eos."],
            'StreetFood' => ["", " Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus impedit magnam cum tempora aliquam ex, minus odit aliquid id eos."]
        ];

        foreach ($tipologies as $key => $tipology) {
            $newtipology = new tipology();
            $newtipology->name = $key;
            $newtipology->slug = Str::slug($newtipology->name);
            $newtipology->cover_image = $tipology[0];
            $newtipology->description = $tipology[1];
            $newtipology->save();
        }
    }
}
