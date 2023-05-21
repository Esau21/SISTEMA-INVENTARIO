<?php

namespace App\Http\Livewire;

use App\Models\Clientes;
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

}
