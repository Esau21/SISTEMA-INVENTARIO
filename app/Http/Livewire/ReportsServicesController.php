<?php

namespace App\Http\Livewire;

use App\Models\Cotization;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class ReportsServicesController extends Component
{

    public $componentName, $data, $details, $userId, $reportType, $dateFrom, $dateTo, $servicesaleId;

    public function mount()
    {
        $this->componentName = 'REPORTES DE SERVICIOS | MANO DE OBRRA';
        $this->data = [];
        $this->details = [];
        $this->reportType = 0;
        $this->userId = 0;
        $this->servicesaleId = 0;
    }

    public function render()
    {

        $this->ServicesforData();

        return view('livewire.services.reports-services-controller', [
            'users' => User::orderBy('name', 'DESC')->get()
        ])
        ->extends('layouts.theme.app')
        ->section('content');
    }

    public function ServicesforData()
    {
        if ($this->reportType == 0) {
            $from = Carbon::parse(Carbon::now())->format('Y:m:d') . ' 00:00:00';
            $to = Carbon::parse(Carbon::now())->format('Y:m:d') . ' 23:59:59';
        } else {
            $from = Carbon::parse($this->dateFrom)->format('Y:m:d') . ' 00:00:00';
            $to = Carbon::parse($this->dateTo)->format('Y:m:d') . ' 23:59:59';
        }

        if($this->reportType == 1 && ($this->dateFrom == '' || $this->dateTo == ''))
        {
            return;
        }

        if($this->userId)
        {
            $this->data = Cotization::join('users as u', 'u.id', 'cotizations.usuarioId')
            ->select('cotizations.*', 'u.name as username')
            ->whereBetween('cotizations.created_at', [$from, $to])
            ->where('usuarioId', $this->userId)
            ->get();
        }
    }

    public function getDetailsServices($servicesaleId)
    {
        $this->details = Cotization::join('users as u', 'u.id', 'cotizations.usuarioId')
        ->select('cotizations.*', 'u.name as username')
        ->where('cotizations.id', $servicesaleId)
        ->get();

        $this->servicesaleId = $servicesaleId;

        $this->emit('show-modal', 'open');
    }
}
