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
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('user');

        $pimpinan = User::create([
            'name' => 'Pimpinan',
            'email' => 'pimpinan@pimpinan.com',
            'password' => bcrypt('12345678'),
        ]);

        $pimpinan->assignRole('pimpinan');
    }
}
