<?php

namespace App\Http\Livewire;

use App\Models\Clientes;
use App\Models\Maquinaria;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class ReportsMaquinariasController extends Component
{

    public $componentName, $data, $details, $clienteId, $reportType, $dateFrom, $dateTo, $maquisaleId;

    public function mount()
    {
        $this->componentName = 'REPORTES DE MAQUINARIAS';
        $this->data = [];
        $this->details = [];
        $this->reportType = 0;
        $this->clienteId = 0;
        $this->maquisaleId = 0;
    }

    public function render()
    {


        $this->MaquinariaByData();

        return view('livewire.reportesmaquinarias.reports-maquinarias-controller', 
        [
            'clientes' => Clientes::orderBy('name', 'DESC')->get()
        ])
        ->extends('layouts.theme.app')
        ->section('content');
    }

    public function MaquinariaByData()
    {
        if($this->reportType == 0)
        {
            $from = Carbon::parse(Carbon::now())->format('Y-m-d') . ' 00:00:00';
            $to = Carbon::parse(Carbon::now())->format('Y-m-d') . ' 23:59:59';
        } else {
            $from = Carbon::parse($this->dateFrom)->format('Y-m-d') . ' 00:00:00';
            $to = Carbon::parse($this->dateTo)->format('Y-m-d') . ' 23:59:59';
        }

        if ($this->reportType == 1 && ($this->dateFrom == '' || $this->dateTo == '')) {
            return;
        }

        if($this->clienteId)
        {
            $this->data = Maquinaria::join('clientes as c', 'c.id', 'maquinarias.clienteId')
            ->select('maquinarias.*', 'c.name as namecliente')
            ->whereBetween('maquinarias.created_at', [$from, $to])
            ->where('clienteId', $this->clienteId)
            ->get();
        }
    }

    public function getDataMaquinarias($maquisaleId)
    {
        $this->details = Maquinaria::join('clientes as c', 'c.id', 'maquinarias.clienteId')
        ->select('maquinarias.*', 'c.name as namecliente')
        ->where('maquinarias.id', $maquisaleId)
        ->get();

        $this->maquisaleId = $maquisaleId;

        $this->emit('show-modal', 'open');
    }
}
