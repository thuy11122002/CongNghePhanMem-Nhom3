<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Roles;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Admin::truncate();
        $adminRoles = Roles::where('name', 'admin')->first();
        $authorRoles = Roles::where('name', 'author')->first();
        $userRoles = Roles::where('name', 'user')->first();

        $admin = Admin::create([
            'admin_name' => 'quanhoang12',
            'admin_email' => 'admin12@gmail.com',
            'admin_phone' => '123456789',
            'admin_password' => md5('123456')
        ]);

        $author = Admin::create([
            'admin_name' => 'author12',
            'admin_email' => 'author12@gmail.com',
            'admin_phone' => '123456789',
            'admin_password' => md5('123456')
        ]);

        $user = Admin::create([
            'admin_name' => 'user12',
            'admin_email' => 'user12@gmail.com',
            'admin_phone' => '123456789',
            'admin_password' => md5('123456')
        ]);

        $admin->roles()->attach($adminRoles);
        $author->roles()->attach($authorRoles);
        $user->roles()->attach($userRoles);

    }
}
