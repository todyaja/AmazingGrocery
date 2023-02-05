<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
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
                'role_name' =>  'user',
            ], [
                'role_name' =>  'admin',
            ],
        ])->each(function ($item) {
            Role::create($item);
        });
    }
}
