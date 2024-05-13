<?php

namespace App\Http\Livewire\Graficos;

use App\Models\Category;
use App\Models\Cotization;
use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use Livewire\Component;

class GraficosComponent extends Component
{

    public  $sale_id;

    public function render()
    {
        return view('livewire.graficos.graficos-component')
            ->extends('layouts.theme.app')
            ->section('content');
    }

    public function graficos()
    {
        $productos = Product::all();

        $products = [];
        foreach ($productos as $p) {
            $products[] = ['name' => $p['name'], 'y' => floatval($p['stock'])];
        }

        $ventas = Sale::join('users as s', 's.id', 'sales.user_id')
            ->select('sales.*', 's.name as name')
            ->where('sales.total', '>', 0) // Agrega una condición válida para filtrar las ventas
            ->get();

        $sale = [];

        foreach ($ventas as $v) {
            $sale[] = ['name' => $v->name, 'y' => floatval($v->items)]; // Utiliza los nombres de columna correctos
        }


        $sales = Sale::all();

        $vsale = [];

        foreach ($sales as $s) {
            $vsale[] = ['total' => $s['total'], 'y' => floatval($s['iva'])];
        }


        $categories = Category::all();

        $cate = [];

        foreach ($categories as $c) {
            $cate[] = ['name' => $c['name'], 'y' => floatval($c['name'])];
        }

        $users = User::all();

        $user = [];

        foreach ($users as $u) {
            $user[] = ['name' => $u['name'], 'y' => floatval($u['name'])];
        }

        $cotizaciones = Cotization::all();
        $coti = [];
        foreach ($cotizaciones as $co) {
            $coti[] = ['total' => $co['total'], 'y' => floatval($co['iva'])];
        }

        $variables = [
            'products' => $products,
            'sale' => $sale,
            'vsale' => $vsale,
            'cate' => $cate,
            'cotizaciones' => $cotizaciones,
            'co' => $co,
            'user' => $user,
        ];

        $users = User::orderBy('id', 'DESC')->get(); // Ejecuta la consulta de usuarios y obtén los resultados

        return view('livewire.graficos.graficos-component', $variables, ['users' => $users])
            ->extends('layouts.theme.app')
            ->section('content');
    }
}
