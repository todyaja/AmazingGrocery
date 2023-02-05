<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();
        for($i=0;$i<20;$i++){
            $item = [
                'item_name' =>  $faker->text(20),
                'item_picture' => $faker->imageUrl(),
                'item_desc' => $faker->text(),
                'price' => rand(20000,150000),
            ];
            Item::create($item);
        };
    }
}
