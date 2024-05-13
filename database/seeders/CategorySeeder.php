<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'COMPRESORES',
            'image' => 'https://dummyimage.com/600x400/000/fff'
        ]);

        Category::create([
            'name' => 'ELEVADORES',
            'image' => 'https://dummyimage.com/600x400/000/fff'
        ]);

        Category::create([
            'name' => 'COMPRESORES DE AIRE',
            'image' => 'https://dummyimage.com/600x400/000/fff'
        ]);

        Category::create([
            'name' => 'COMPUTADORAS DE VEHICULOS',
            'image' => 'https://dummyimage.com/600x400/000/fff'
        ]);
    }
}
