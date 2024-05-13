<?php

namespace App\Http\Livewire;

use App\Models\Clientes;
use App\Models\Cotization;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Luecano\NumeroALetras\NumeroALetras;
use PDF;

class CotizationController extends Component
{

    use WithPagination;
    use WithFileUploads;

    public $search, $nombrepro, $image, $fechacotizacion, $observaciones, $price, $selected_id,
        $manoobra, $total_manoobra, $iva, $total, $clienteId, $usuarioId, $pageTitle, $componentName;
    private $pagination = 5;

    public function mount()
    {
        $this->pageTitle = 'Servicios';
        $this->componentName = 'Sistema';
    }

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    public function render()
    {

        if (strlen($this->search) > 0)
            $cotizaciones = Cotization::join('clientes as c', 'c.id', 'cotizations.clienteId')
                ->join('users as u', 'u.id', 'cotizations.usuarioId')
                ->select('cotizations.*', 'c.name as clientename', 'u.name as usuarioname')
                ->orWhere('cotizations.nombrepro', 'LIKE', '%' . $this->search . '%')
                ->orWhere('cotizations.fechacotizacion', 'LIKE', '%' . $this->search . '%')
                ->orWhere('cotizations.precio', 'LIKE', '%' . $this->search . '%')
                ->orWhere('cotizations.observaciones', 'LIKE', '%' . $this->search . '%')
                ->orWhere('c.name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('u.name', 'LIKE', '%' . $this->search . '%')
                ->orderBy('cotizations.nombrepro', 'ASC')
                ->paginate($this->pagination);
        else
            $cotizaciones = Cotization::join('clientes as c', 'c.id', 'cotizations.clienteId')
                ->join('users as u', 'u.id', 'cotizations.usuarioId')
                ->select('cotizations.*', 'c.name as clientename', 'u.name as usuarioname')
                ->orderBy('cotizations.nombrepro', 'ASC')
                ->paginate($this->pagination);


        return view('livewire.cotizaciones.cotization-controller', [
            'cotizaciones' => $cotizaciones,
            'clientes' => Clientes::orderBy('name', 'ASC')->get(),
            'usuarios' => User::orderBy('name', 'ASC')->get()
        ])
            ->extends('layouts.theme.app')
            ->section('content');
    }

    public function resetUI()
    {
        $this->nombrepro = '';
        $this->image = '';
        $this->fechacotizacion = '';
        $this->observaciones = '';
        $this->price = '';
        $this->manoobra = '';
        $this->total_manoobra = '';
        $this->iva = '';
        $this->total = '';
        $this->clienteId = '';
        $this->usuarioId = '';
        $this->selected_id = 0;
    }

    public function updated($field)
    {
        if ($field == 'price' || $field == 'total_manoobra' || $field == 'manoobra') {
            $this->Iva();
        }
    }

    public function Iva()
    {
        $iva = 0.13;
        $precioMP = $this->price ?? 0;
        $total_manoobra = $this->total_manoobra ?? 0;

        $subTotal = $precioMP + $total_manoobra;
        $montoIva = $subTotal * $iva;
        $this->total = $subTotal + $montoIva;

        $this->iva = $montoIva;

        $this->emit('calculated-iva');
    }


    protected $listeners = [
        'calculated-iva' => '$refresh',
        'deleteRow' => 'Destroy',
    ];

    public function Store()
    {


        $cotization = Cotization::create([
            'nombrepro' => $this->nombrepro,
            'image' => $this->image,
            'fechacotizacion' => $this->fechacotizacion,
            'observaciones' => $this->observaciones,
            'price' => $this->price,
            'manoobra' => $this->manoobra,
            'total_manoobra' => $this->total_manoobra,
            'iva' => $this->iva,
            'total' => $this->total,
            'clienteId' => $this->clienteId,
            'usuarioId' => $this->usuarioId,
        ]);

        $customFileImage;
        if ($this->image) {
            $customFileImage = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/cotizaciones', $customFileImage);
            $cotization->image = $customFileImage;
            $cotization->save();
        }

        $this->emit('add-manoobra', 'COTIZACION AGREGADA CON EXITO');
    }

    public function Edit($id)
    {
        $coti = Cotization::find($id, [
            'id', 'nombrepro', 'image', 'fechacotizacion', 'observaciones', 'price', 'manoobra', 'total_manoobra',
            'iva', 'total', 'clienteId', 'usuarioId'
        ]);

        $this->selected_id = $coti->id;
        $this->nombrepro = $coti->nombrepro;
        $this->image = $coti->image;
        $this->fechacotizacion = $coti->fechacotizacion;
        $this->observaciones = $coti->observaciones;
        $this->price = $coti->price;
        $this->manoobra = $coti->manoobra;
        $this->total_manoobra = $coti->total_manoobra;
        $this->iva = $coti->iva;
        $this->total = $coti->total;
        $this->clienteId = $coti->clienteId;
        $this->usuarioId = $coti->usuarioId;


        $this->emit('show-modal');
    }

    public function Update()
    {
        $coti = Cotization::find($this->selected_id);
        $coti->update([
            'nombrepro' => $this->nombrepro,
            'image' => $this->image,
            'fechacotizacion' => $this->fechacotizacion,
            'observaciones' => $this->observaciones,
            'price' => $this->price,
            'manoobra' => $this->manoobra,
            'total_manoobra' => $this->total_manoobra,
            'iva' => $this->iva,
            'total' => $this->total,
            'clienteId' => $this->clienteId,
            'usuarioId' => $this->usuarioId,
        ]);

        if ($this->image) {
            $customFileImage = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/cotizaciones', $customFileImage);
            $imageName = $coti->image;
            $coti->image = $customFileImage;
            $coti->save();


            if ($imageName != null) {
                if (file_exists('storage/cotizaciones' . $imageName)) {
                    unlink('storage/cotizaciones' . $imageName);
                }
            }
        }

        $this->resetUI();
        $this->emit('update-coti', 'SERVICIO ACTUZLIAZADO');
    }

    public function Destroy(Cotization $cotization)
    {
        $imageTemp = $cotization->image;
        $cotization->delete();

        if($imageTemp !=null)
        {
            if(file_exists('storage/cotizaciones/' . $imageTemp ))
            {
                unlink('storage/cotizaciones/' . $imageTemp);
            }
        }

        $this->resetUI();
        $this->emit('coti-deleted', 'SERVICIO DE MANO DE OBRA ELIMINADA');

    }


    public function PdfCoti($cotiId)
{
    $cotizacion = Cotization::find($cotiId);
    $clientes = Clientes::find($cotizacion->clienteId);
    $usuarios = User::find($cotizacion->usuarioId);

    $iva = 0.13;
    $precioMP = $cotizacion->price ?? 0;
    $total_manoobra = $cotizacion->total_manoobra ?? 0;

    $subTotal = $precioMP + $total_manoobra;
    $montoIva = $subTotal * $iva;
    $total = $subTotal + $montoIva;

    // Calcula el total de la cotización y pasa las variables a la vista
    $foramtter = new NumeroALetras();
    $alerts = $foramtter->toMoney(number_format($subTotal, 2, '.', ''), 2, 'DOLARES', 'CENTAVOS');

    $pdf = PDF::loadView('pdf.coti', compact('cotizacion', 'usuarios', 'montoIva', 'alerts', 'clientes', 'subTotal', 'total'));
    return $pdf->stream('coti.pdf');
}

}
