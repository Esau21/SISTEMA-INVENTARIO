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
            'name' => 'Izabele',
            'phone' => '77654357',
            'email' => 'izabele',
            'profile' => 'Admin',
            'status' => 'Active',
            'password' => bcrypt('12345')
        ]);
        User::create([
            'name' => 'Daniela',
            'phone' => '77654357',
            'email' => 'daniela',
            'profile' => 'Admin',
            'status' => 'Active',
            'password' => bcrypt('12345')
        ]);
        User::create([
            'name' => 'Ivania',
            'phone' => '77654357',
            'email' => 'ivania',
            'profile' => 'Admin',
            'status' => 'Active',
            'password' => bcrypt('12345')
        ]);
    }
}
