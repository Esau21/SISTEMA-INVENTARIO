<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'LLANTAS TRACTOR',
            'cost' => 200,
            'price' => 350,
            'barcode' => '75010065987',
            'stock' => 1000,
            'alerts' => 10,
            'category_id' => 1,
            'image' => 'curso.png'
        ]);

        Product::create([
            'name' => 'BUJIAS',
            'cost' => 600,
            'price' => 1500,
            'barcode' => '76098872014',
            'stock' => 1000,
            'alerts' => 10,
            'category_id' => 2,
            'image' => 'tenis.png'
        ]);

        Product::create([
            'name' => 'RADIADORES',
            'cost' => 900,
            'price' => 1400,
            'barcode' => '7709876541',
            'stock' => 1000,
            'alerts' => 10,
            'category_id' => 3,
            'image' => 'iphoner11.png'
        ]);

        Product::create([
            'name' => 'ELEVADORES DE VEHICULOS',
            'cost' => 790,
            'price' => 1350,
            'barcode' => '790654812',
            'stock' => 1000,
            'alerts' => 10,
            'category_id' => 4,
            'image' => 'pcgamer.png'
        ]);
    }
}
