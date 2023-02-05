<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $items = collect([
            [
                'first_name' =>  'user',
                'last_name' =>  'aja',
                'email' =>  'user@gmail.com',
                'gender_id' =>  1,
                'role_id' =>  1,
                'display_picture' =>  'guest.jpg',
                'password' =>  bcrypt('password'),
            ], [
                'first_name' =>  'admin',
                'last_name' =>  'aja',
                'email' =>  'admin@gmail.com',
                'gender_id' =>  2,
                'role_id' =>  2,
                'display_picture' =>  'guest.jpg',
                'password' =>  bcrypt('password'),
            ],
        ])->each(function ($item) {
            User::create($item);
        });
    }
}
