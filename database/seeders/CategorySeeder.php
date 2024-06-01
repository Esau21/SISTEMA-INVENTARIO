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
            'name' => 'MAQUINARIA PESADA',
            'image' => 'https://dummyimage.com/600x400/000/fff'
        ]);

        Category::create([
            'name' => 'ACEITES',
            'image' => 'https://dummyimage.com/600x400/000/fff'
        ]);

        Category::create([
            'name' => 'EXCABADORAS',
            'image' => 'https://dummyimage.com/600x400/000/fff'
        ]);

        Category::create([
            'name' => 'MINI CARGADOR',
            'image' => 'https://dummyimage.com/600x400/000/fff'
        ]);

        Category::create([
            'name' => 'MINI BOBCAT',
            'image' => 'https://dummyimage.com/600x400/000/fff'
        ]);
    }
}
