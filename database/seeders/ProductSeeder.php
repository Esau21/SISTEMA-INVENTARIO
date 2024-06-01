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
            'name' => 'llanta minibobcat',
            'descripcion' => '10 lonas, Marca terra plus, Medidas de 12-16.5, Capacidad máxima 2800 kg',
            'servico_obra' => 'SI',
            'servicio' => 35,
            'cost' => 200,
            'price' =>  525,
            'barcode' => '001',
            'stock' => 1000,
            'alerts' => 10,
            'category_id' => 1,
            'image' => 'curso.png'
        ]);

        Product::create([
            'name' => 'llanta minibobcat',
            'descripcion' => '12 lonas, Marca ARMOUR, Medidas de 12-16.5, Capacidad máxima 3000 kg',
            'servico_obra' => 'SI',
            'servicio' => 35,
            'cost' => 600,
            'price' => 580,
            'barcode' => '002',
            'stock' => 1000,
            'alerts' => 10,
            'category_id' => 2,
            'image' => 'tenis.png'
        ]);
        Product::create([
            'name' => 'Llanta para tractor R1/R1W ',
            'descripcion' => 'Medida:11.2-24, Tipo:Convencional Tube Type, Modelo:FARMAX R1',
            'servico_obra' => 'NO',
            'servicio' => 0,
            'cost' => 600,
            'price' => 600,
            'barcode' => '003',
            'stock' => 1000,
            'alerts' => 10,
            'category_id' => 2,
            'image' => 'tenis.png'
        ]);
        Product::create([
            'name' => 'llanta industrial (R4)',
            'descripcion' => 'Medidas de 19.5L-24 12PR EL23',
            'servico_obra' => 'NO',
            'servicio' => 0,
            'cost' => 600,
            'price' => 580,
            'barcode' => '004',
            'stock' => 1000,
            'alerts' => 10,
            'category_id' => 2,
            'image' => 'tenis.png'
        ]);
        Product::create([
            'name' => 'Aceite de motor 15W40 CI-4 domoil forza',
            'descripcion' => 'para excavadoras',
            'servico_obra' => 'SI',
            'servicio' => 35,
            'cost' => 600,
            'price' => 300,
            'barcode' => '005',
            'stock' => 1000,
            'alerts' => 10,
            'category_id' => 2,
            'image' => 'tenis.png'
        ]);
        Product::create([
            'name' => 'Aceite de transmisión 80W90 domoil',
            'descripcion' => 'para excavadoras',
            'servico_obra' => 'SI',
            'servicio' => 35,
            'cost' => 600,
            'price' => 175,
            'barcode' => '006',
            'stock' => 1000,
            'alerts' => 10,
            'category_id' => 2,
            'image' => 'tenis.png'
        ]);
        Product::create([
            'name' => 'Aceite hidráulico Domoil ESO68',
            'descripcion' => 'para excavadoras',
            'servico_obra' => 'SI',
            'servicio' => 35,
            'cost' => 600,
            'price' => 240,
            'barcode' => '007',
            'stock' => 1000,
            'alerts' => 10,
            'category_id' => 2,
            'image' => 'tenis.png'
        ]);
    }
}
