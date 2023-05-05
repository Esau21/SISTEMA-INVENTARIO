<?php

namespace App\Http\Livewire;

use App\Models\Clientes;
use Livewire\Component;
use Livewire\WithPagination;

class ClienteController extends Component
{
    use WithPagination;

    public $name, $direccion, $nit, $telefono, $pageTitle, $componentName, $search, $selected_id;
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
}
