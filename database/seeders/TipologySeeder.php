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
        $tipologies = [ 'Italiana'   =>[""," Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus impedit magnam cum tempora aliquam ex, minus odit aliquid id eos."],
                        'Cinese'     =>[""," Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus impedit magnam cum tempora aliquam ex, minus odit aliquid id eos."],
                        'Messicana'  =>[""," Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus impedit magnam cum tempora aliquam ex, minus odit aliquid id eos."],
                        'Vegana'     =>[""," Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus impedit magnam cum tempora aliquam ex, minus odit aliquid id eos."],
                        'Giapponese' =>[""," Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus impedit magnam cum tempora aliquam ex, minus odit aliquid id eos."],
                        'Celiaca'    =>[""," Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus impedit magnam cum tempora aliquam ex, minus odit aliquid id eos."],
                        'Indiana'    =>[""," Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus impedit magnam cum tempora aliquam ex, minus odit aliquid id eos."],
                        'StreetFood' =>[""," Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus impedit magnam cum tempora aliquam ex, minus odit aliquid id eos."]
                        ];

        foreach ($tipologies as $key=> $tipology) {
            $newtipology = new tipology();
            $newtipology->name = $key;
            $newtipology->slug = Str::slug($newtipology->name);
            $newtipology->cover_image = $tipology[0];
            $newtipology->description = $tipology[1];
            $newtipology->save();
        }
    }
}