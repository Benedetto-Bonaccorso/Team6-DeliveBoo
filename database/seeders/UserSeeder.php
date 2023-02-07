<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            'pippo' => ['pippo@test.it', 'password'],
            'mario' => ['mario@test.it', 'password'],
            'luigi' => ['luigi@test.it', 'password'],
            'sandro' => ['sandro@test.it', 'password']
        ];

        foreach ($users as $key => $user) {
            $newuser = new User();
            $newuser->name = $key;
            $newuser->email = $user[0];
            $newuser->password = $user[1];
            $newuser->save();
        }
    }
}
