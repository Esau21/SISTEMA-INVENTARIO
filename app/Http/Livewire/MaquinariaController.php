<?php

namespace App\Http\Livewire;

use App\Models\Clientes;
use App\Models\Maquinaria;
use PDF;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class MaquinariaController extends Component
{

    use WithPagination;
    use WithFileUploads;

    public $pageTitle, $componentName, $selected_id,
        $name, $description, $status, $fecha_salida, $fecha_entrega,
        $hora_salida, $hora_entrega, $price, $iva, $total, $year, $model, $clienteId, $search;

    private $pagination = 5;

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    public function mount()
    {
        $this->pageTitle = 'MAQUINARIA';
        $this->componentName = 'SERVICIOS';
    }

    public function render()
    {

        if (strlen($this->search) > 0)
            $maquinarias = Maquinaria::join('clientes as c', 'c.id', 'maquinarias.clienteId')
                ->select('maquinarias.*', 'c.name as clientename')
                ->Where('maquinarias.name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('maquinarias.description', 'LIKE', '%' . $this->search . '%')
                ->orWhere('maquinarias.fecha_salida', 'LIKE', '%' . $this->search . '%')
                ->orWhere('c.name', 'LIKE', '%' . $this->search . '%')
                ->orderBy('maquinarias.id', 'DESC')
                ->paginate($this->pagination);
        else
            $maquinarias = Maquinaria::join('clientes as c', 'c.id', 'maquinarias.clienteId')
                ->select('maquinarias.*', 'c.name as clientename')
                ->orderBy('maquinarias.id', 'DESC')
                ->paginate($this->pagination);



        return view('livewire.maquinarias.maquinaria-controller', [
            'maquinarias' => $maquinarias,
            'clientes' => Clientes::orderBy('name', 'DESC')->get()
        ])
            ->extends('layouts.theme.app')
            ->section('content');
    }

    public function resetUI()
    {
        $this->name = '';
        $this->description = '';
        $this->status = '';
        $this->fecha_salida = '';
        $this->fecha_entrega = '';
        $this->hora_salida = '';
        $this->hora_entrega = '';
        $this->price = '';
        $this->iva = '';
        $this->total = '';
        $this->year = '';
        $this->model = '';
        $this->image = '';
        $this->clienteId = '';
        $this->selected_id = 0;
    }

    public function updated($field)
    {
        if($field == 'price' || $field == 'iva' || $field == 'total'){
            $this->calculateIva();
        }
    }

    public function calculateIva()
    {
        $iva = 0.13;

        $precioM = $this->price ?? 0;
        $montoIva = $precioM * $iva;
        $this->total = $montoIva + $precioM;

        $this->iva = $montoIva;

        $this->emit('calculated-iva');
    }

    protected $listeners = [
        'calculated-iva' => '$refresh',
        'deleteRow' => 'Destroy',
    ];

    public function Store()
    {
        $maquinarias = Maquinaria::create([
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
            'fecha_salida' => $this->fecha_salida,
            'fecha_entrega' => $this->fecha_entrega,
            'hora_salida' => $this->hora_salida,
            'hora_entrega' => $this->hora_entrega,
            'price' => $this->price,
            'iva' => $this->iva,
            'total' => $this->total,
            'year' => $this->year,
            'model' => $this->model,
            'clienteId' => $this->clienteId,
        ]);

        $maquinarias->save();

        $this->emit('maqui-add', 'EL SERVICIO SE INSERTO CORRECTAMENTE.');
    }

    public function Edit($id)
    {
        $maqui = Maquinaria::find($id, 
        ['id', 'name', 'description', 
        'status', 'fecha_salida', 'fecha_entrega', 
        'hora_salida', 'hora_entrega', 'price', 'iva', 'total', 'year', 'model', 'clienteId']);

        $this->selected_id = $maqui->id;
        $this->name = $maqui->name;
        $this->description = $maqui->description;
        $this->status = $maqui->status;
        $this->fecha_salida = $maqui->fecha_salida;
        $this->fecha_entrega = $maqui->fecha_entrega;
        $this->hora_salida = $maqui->hora_salida;
        $this->hora_entrega = $maqui->hora_entrega;
        $this->price = $maqui->price;
        $this->iva = $maqui->iva;
        $this->total = $maqui->total;
        $this->year = $maqui->year;
        $this->model = $maqui->model;
        $this->clienteId = $maqui->clienteId;

        $this->emit('show-modal');
    }

    public function Update()
    {
        $machinaries = Maquinaria::find($this->selected_id);
        $machinaries->update([
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
            'fecha_salida' => $this->fecha_salida,
            'fecha_entrega' => $this->fecha_entrega,
            'hora_salida' => $this->hora_salida,
            'hora_entrega' => $this->hora_entrega,
            'price' => $this->price,
            'iva' => $this->iva,
            'total' => $this->total,
            'year' => $this->year,
            'model' => $this->model,
            'clienteId' => $this->clienteId,
        ]);

        $machinaries->save();
        $this->resetUI();
        $this->emit('update-machinaries', 'EQUIPO DE MAQUINARIA ACTULIZADA CORRECTAMENTE');
    }




    public function Destroy(Maquinaria $maquinarias)
    {

        $maquinarias->delete();

        
        $this->resetUI();
        $this->emit('maqui-deleted', 'SERVICIO DE MAQUINARIA ELIMINADA');

    }


    public function printFactura($saleMaquinariaId)
    {
        $maquinariasP = Maquinaria::find($saleMaquinariaId);
        $clientes = Clientes::find($maquinariasP->clienteId);

        $iva = 0.13;

        $precioM = $this->price ?? 0;
        $montoIva = $precioM * $iva;
        $this->total = $montoIva + $precioM;

        $this->iva = $montoIva;

        $pdf = PDF::loadView('pdf.maquinarias', compact('maquinariasP', 'clientes', 'montoIva'));
        return $pdf->stream('pdf.maquinarias-S.A-DE-C.V');
    }
}
