<?php

namespace App\Http\Livewire;

use App\Models\Clientes;
use App\Models\Facturacion;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class FacturacionController extends Component
{

    use WithPagination;

    public $monto, $saldo, $estado, $tipo_documento, $id_producto, $selected_id, $pageTitle, $componentName, $search, $id_cliente, $iva, $fecha_emision, $fecha_vencimiento, $notas,  $descuento, $subtotal, $total_pagado;
    private $pagination = 5;

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }


    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Facturacion';
    }

    public function render()
    {

        if (strlen($this->search) > 0)
            $facturacions = Facturacion::join('products as p', 'p.id', 'facturacions.id_producto')
                ->join('clientes as c', 'c.id', 'facturacions.id_cliente')
                ->select('facturacions.*', 'p.name as nameproduct', 'c.name as clientename')
                ->where('facturacions.monto', 'LIKE', '%' . $this->search . '%')
                ->orWhere('facturacions.saldo', 'LIKE', '%' . $this->search . '%')
                ->orWhere('p.name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('c.name', 'LIKE', '%' . $this->search . '%');
        else
            $facturacions = Facturacion::join('products as p', 'p.id', 'facturacions.id_producto')
                ->join('clientes as c', 'c.id', 'facturacions.id_cliente')
                ->select('facturacions.*', 'p.name as nameproduct', 'c.name as clientename')
                ->orderBy('id', 'ASC')
                ->paginate($this->pagination);

        return view('livewire.facturacion.component', ['facturacions' => $facturacions, 'p' => Product::orderBy('id', 'ASC')->get(), 'c' => Clientes::orderBy('id', 'ASC')->get()])
            ->extends('layouts.theme.app')
            ->section('content');
    }

    public function resetUI()
    {
        $this->monto = '';
        $this->saldo = '';
        $this->estado = '';
        $this->tipo_documento = '';
        $this->id_producto = '';
        $this->id_cliente = '';
        $this->iva = '';
        $this->fecha_emision = '';
        $this->fecha_vencimiento = '';
        $this->notas = '';
        $this->descuento = '';
        $this->subtotal = '';
        $this->total_pagado = '';
        $this->selected_id = 0;
        $this->resetValidation();
        $this->resetPage();
    }


    public function Store()
    {
        $rules = [
            'monto' => 'required',
            'saldo' => 'required',
            'estado' => 'required|not_in:Elegir',
            'tipo_documento' => 'required',
            'id_producto' => 'required|not_in:Elegir',
            'id_cliente' => 'required|not_in:Elegir',
            'iva' => 'required',
            'fecha_emision' => 'required',
            'fecha_vencimiento' => 'required',
            'notas' => 'required',
            'descuento' => 'required',
            'subtotal' => 'required',
            'total_pagado' => 'required',
        ];

        $messages = [
            'monto.required' => 'El monto de la factura que quieres crear es necesario',
            'saldo.required' => 'El saldo de la factura que quieres crear es necesario',
            'estado.not_in' => 'Tienes que elegir el estado de la factura',
            'tipo_documento.required' => 'Tienes que elegir el tipo de documento.',
            'id_producto.not_in' => 'Tienes que seleccionar el producto para generar la factura',
            'id_cliente.not_in' => 'Tienes que seleccionar al cliente que quieres facturizar',
            'iva.required' => 'El iva es requerido',
            'fecha_emision.required' => 'La fecha de emision es requerida',
            'fecha_vencimiento.required' => 'La fecha de vencimeinto es requerida',
            'notas.required' => 'Las notas son requeridas',
            'descuento.required' => 'El decuento es requerido',
            'subtotal.required' => 'El subtotal es requerido',
            'total_pagado.required' => 'El total a pagar es requerido',
        ];

        $this->validate($rules, $messages);

        $facturacion = Facturacion::create([
            'monto' => $this->monto,
            'saldo' => $this->saldo,
            'estado' => $this->estado,
            'tipo_documento' => $this->tipo_documento,
            'id_producto' => $this->id_producto,
            'id_cliente' => $this->id_cliente,
            'iva' =>  $this->iva,
            'fecha_emision' => $this->fecha_emision,
            'fecha_vencimiento' => $this->fecha_vencimiento,
            'notas' => $this->notas,
            'descuento' => $this->descuento,
            'subtotal' => $this->subtotal,
            'total_pagado' => $this->total_pagado,
        ]);

        $facturacion->save();

        $this->resetUI();
        $this->emit('facturacion-added', 'Factura guardada en el sistema');
    }


    public function calculateAverage()
    {
        $calcular_total = $this->monto + $this->saldo;
        $this->iva = $calcular_total * 0.13;
    }
}
