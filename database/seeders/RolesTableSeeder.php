<?php

namespace Database\Seeders;
use App\Models\AppModelsRole;
use App\Models\Roles;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Roles::truncate();
        Roles::create(['name'=>'admin']);
        Roles::create(['name'=>'author']);
        Roles::create(['name'=>'user']);

    }
}
