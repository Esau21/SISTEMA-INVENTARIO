<?php

namespace App\Http\Livewire;

use App\Models\Clientes;
use Facade\FlareClient\Http\Client;
use Livewire\Component;
use Livewire\WithPagination;

class ClienteController extends Component
{
    use WithPagination;

    public $name, $direccion, $nit, $giro, $nrc, $telefono, $pageTitle, $componentName, $search, $selected_id;
    private $pagination = 5;
    protected $paginationTheme = 'bootstrap';



    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Clientes';
    }

    public function render()
    {
        if (strlen($this->search) > 0)
            $clientes = Clientes::where('name', 'LIKE', '%' . $this->search . '%')
                ->select('clientes.*')
                ->orWhere('nit', 'LIKE', '%' . $this->search . '%')
                ->orderBy('id', 'ASC')
                ->paginate($this->pagination);
        else
            $clientes = Clientes::where('name', 'LIKE', '%' . $this->search . '%')
                ->orderBy('id', 'ASC')
                ->paginate($this->pagination);

        return view('livewire.clientes.client', ['clientes' => $clientes])
            ->extends('layouts.theme.app')
            ->section('content');
    }

    public function resetUI()
    {
        $this->name = "";
        $this->direccion = "";
        $this->nit = "";
        $this->nrc = "";
        $this->giro = ""; 
        $this->telefono = "";
        $this->selected_id = 0;
    }

    public function Store()
    {
        $cliente = Clientes::create([
            'name' => $this->name,
            'direccion' => $this->direccion,
            'nit' => $this->nit,
            'nrc' => $this->nrc,
            'giro' => $this->giro,
            'telefono' => $this->telefono
        ]);

        $cliente->save();

        $this->emit('cliente-added', 'Cliente agregado');
    }

    public function Edit($id)
    {
        $clientes = Clientes::find($id, ['id', 'name', 'direccion', 'nit', 'nrc', 'giro', 'telefono']);
        $this->selected_id = $clientes->id;
        $this->name = $clientes->name;
        $this->direccion = $clientes->direccion;
        $this->nit = $clientes->nit;
        $this->nrc = $clientes->nrc;
        $this->giro = $clientes->giro;
        $this->telefono = $clientes->telefono;
        $this->emit('show-modal', 'Modal show');
    }

    public function Update()
    {

        $cliente = Clientes::find($this->selected_id);

        $cliente->update([
            'name' => $this->name,
            'direccion' => $this->direccion,
            'nit' => $this->nit,
            'nrc' => $this->nrc,
            'giro' => $this->giro,
            'telefono' => $this->telefono
        ]);

        $this->emit('cliente-updated', 'Cliente actualizado');
    }

    protected $listeners = [
        'deleteRow' => 'Destroy'
    ];


    public function Destroy(Clientes $cliente)
    {
        $cliente->delete();

        $this->resetUI();
        $this->emit('cliente-delete', 'Cliente eliminado');
    }

}
