<?php

namespace App\Http\Controllers;

use App\Exports\SalesExport;
use App\Models\Clientes;
use App\Models\Cotization;
use App\Models\Maquinaria;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use App\Models\Sale;
use App\Models\User;
use App\Models\SaleDetails;
use Maatwebsite\Excel\Facades\Excel;


class ExportController extends Controller
{
    public function reportPDF($userId, $reportType, $dateFrom = null, $dateTo = null)
    {
        $data = [];

        if ($reportType == 0) //Ventas del dia
        {
            $from = Carbon::parse(Carbon::now())->format('Y-m-d') . ' 00:00:00';
            $to = Carbon::parse(Carbon::now())->format('Y-m-d') . ' 23:59:59';
        } else {
            $from = Carbon::parse($dateFrom)->format('Y-m-d') . ' 00:00:00';
            $to = Carbon::parse($dateTo)->format('Y-m-d') . ' 23:59:59';
        }

        if ($userId == 0) {
            $data = Sale::join('users as u', 'u.id', 'sales.user_id')
                ->join('sale_details as sd', 'sd.sale_id', 'sales.id')
                ->join('products as p', 'p.id', 'sd.product_id')
                ->select('sales.*', 'u.name as user', 'p.name as productname')
                ->whereBetween('sales.created_at', [$from, $to])
                ->get();
        } else {
            $data = Sale::join('users as u', 'u.id', 'sales.user_id')
                ->join('sale_details as sd', 'sd.sale_id', 'sales.id')
                ->join('products as p', 'p.id', 'sd.product_id')
                ->select('sales.*', 'u.name as user', 'p.name as productname')
                ->whereBetween('sales.created_at', [$from, $to])
                ->get();
        }

        $user = $userId == 0 ? 'Todos' : User::find($userId)->name;
        $pdf = PDF::loadView('pdf.reporte', compact('data', 'reportType', 'user', 'dateFrom', 'dateTo'));

        return $pdf->stream('salesReport.pdf');
        return $pdf->download('salesReport.pdf');
    }

    public function reportMaquinariaPdf($clienteId, $reportType, $dateFrom = null, $dateTo = null)
    {
        $data = [];

        if ($reportType == 0) {
            $from = Carbon::parse(Carbon::now())->format('Y-m-d') . ' 00:00:00';
            $to = Carbon::parse(Carbon::now())->format('Y-m-d') . ' 23:59:59';
        } else {
            $from = Carbon::parse($dateFrom)->format('Y-m-d') . ' 00:00:00';
            $to = Carbon::parse($dateTo)->format('Y-m-d') . ' 23:59:59';
        }

        if ($clienteId == 0) {
            $data = Maquinaria::join('clientes as c', 'c.id', 'maquinarias.clienteId')
                ->select('maquinarias.*', 'c.name as namecliente')
                ->whereBetween('maquinarias.created_at', [$from, $to])
                ->get();
        } else {
            $data = Maquinaria::join('clientes as c', 'c.id', 'maquinarias.clienteId')
                ->select('maquinarias.*', 'c.name as namecliente')
                ->whereBetween('maquinarias.created_at', [$from, $to])
                ->where('clienteId', $clienteId)
                ->get();
        }

        $cliente = $clienteId == 0 ? 'Todos' : Clientes::find($clienteId)->name;
        $pdf = PDF::loadView('pdf.informe_maquinaria', compact('data', 'reportType', 'cliente', 'dateFrom', 'dateTo'));
        return $pdf->stream('informeMaquinaria.pdf');
        return $pdf->download('informeMaquinaria.pdf');
    }

    public function ManoObraPdf($userId, $reportType, $dateFrom = null, $dateTo = null)
    {
        $data = [];

        if ($reportType == 0) {
            $from = Carbon::parse(Carbon::now())->format('Y-m-d') . ' 00:00:00';
            $to = Carbon::parse(Carbon::now())->format('Y-m-d') . ' 23:59:59';
        } else {
            $from = Carbon::parse($dateFrom)->format('Y-m-d') . ' 00:00:00';
            $to = Carbon::parse($dateTo)->format('Y-m-d') . ' 23:59:59';
        }

        if ($userId == 0) {
            $data = Cotization::join('users as u', 'u.id', 'cotizations.usuarioId')
                ->select('cotizations.*', 'u.name as username')
                ->whereBetween('cotizations.created_at', [$from, $to])
                ->get();
        } else {
            $data = Cotization::join('users as u', 'u.id', 'cotizations.usuarioId')
                ->select('cotizations.*', 'u.name as username')
                ->whereBetween('cotizations.created_at', [$from, $to])
                ->where('usuarioId', $userId)
                ->get();
        }

        $user = $userId == 0 ? 'Todos' : User::find($userId)->name;
        $pdf = PDF::loadView('pdf.informe_servicios', compact('data', 'reportType', 'user', 'dateFrom', 'dateTo'));
        return $pdf->stream('InformeServices.pdf');
        return $pdf->download('InformeServices.pdf');
    }

    public function reporteExcel($userId, $reportType, $dateFrom = null, $dateTo = null)
    {
        $reportName = 'Reporte de ventas_' . uniqid() . '.xlsx';
        return Excel::download(new SalesExport($userId, $reportType, $dateFrom, $dateTo), $reportName);
    }
}
