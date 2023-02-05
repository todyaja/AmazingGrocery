<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = collect([
            [
                'gender_desc' =>  'Male',
            ], [
                'gender_desc' =>  'Female',
            ],
        ])->each(function ($item) {
            Gender::create($item);
        });
    }
}
