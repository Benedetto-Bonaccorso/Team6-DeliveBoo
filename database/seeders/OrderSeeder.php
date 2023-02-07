<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            'Luigi'   => ["Via giuseppe 7", "018-7547891", 27],
            'Mario'   => ["Via repubblica 7", "444-7547891", 13.50],
            'Franco'   => ["Via milano 7", "111-7547891", 4.50],
        ];

        foreach ($orders as $key => $order) {
            $neworder = new Order();
            $neworder->name = $key;
            $neworder->address = $order[0];
            $neworder->phone = $order[1];
            $neworder->total_payment = $order[2];
            $neworder->save();
        }
    }
}
