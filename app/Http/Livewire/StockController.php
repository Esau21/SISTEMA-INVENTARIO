<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class StockController extends Component
{

    public $selected_id,$stock,$stock_min,$producto;
    public function render()
    {
        $data = Product::orderBy('id','desc')->paginate(10);
        return view('livewire.stock.index',['data' => $data])->extends('layouts.theme.app')
        ->section('content');
    }

    public function Edit(Product $product){
        $this->selected_id = $product->id;
        $this->producto = $product->name;
        $this->stock = $product->stock;
        $this->stock_min = $product->alerts;
        $this->emit('show-modal');
    }
    public function update(){
        $product = Product::find($this->selected_id);
        $product->update([
            'stock' => $this->stock,
            'alerts' => $this->stock_min
        ]);
        $product->save();
        $this->emit('stock-update', 'Stock Actualizado');
        
    }
}
