<?php

namespace Database\Seeders;

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
        User::create([
            'name' => 'Edgar',
            'phone' => '7876543234',
            'email' => 'edgar@gmail.com',
            'profile' => 'Admin',
            'status' => 'Active',
            'password' => bcrypt('12345')
        ]);

        User::create([
            'name' => 'Esau Zelaya',
            'phone' => '7978523234',
            'email' => 'esau4321@gmail.com',
            'profile' => 'Cliente',
            'status' => 'Active',
            'password' => bcrypt('123')
        ]);

    }
}
