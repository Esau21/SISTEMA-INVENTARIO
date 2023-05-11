<?php

use App\Http\Livewire\CategoriesController;
use App\Http\Livewire\ProductsController;
use App\Http\Livewire\CoinsController;
use App\Http\Livewire\CashoutController;
use App\Http\Controllers\ExportController;
use App\Http\Livewire\PosController;
use App\Http\Livewire\RolesController;
use App\Http\Livewire\ReportsController;
use App\Http\Livewire\PermisosController;
use App\Http\Livewire\AsignarController;
use App\Http\Livewire\ClienteController;
use App\Http\Livewire\FacturacionController;
use App\Http\Livewire\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('categories', CategoriesController::class);
    Route::get('products', ProductsController::class);
    Route::get('coins', CoinsController::class);
    Route::get('pos', PosController::class);
    Route::get('/ticket/{saleId}', [PosController::class, 'printTicket'])->name('ticket');

    
    Route::group(['middleware' => ['role:Admin']], function () {
       
    });

    Route::get('roles', RolesController::class);
    Route::get('permisos', PermisosController::class);
    Route::get('asignar', AsignarController::class);
    Route::get('users', UsersController::class);
    Route::get('cashout', CashoutController::class);
    Route::get('reports', ReportsController::class);
    Route::get('facturacion', FacturacionController::class);
    Route::get('clientes', ClienteController::class);
});









//REPORTES
Route::get('report/pdf/{user}/{type}/{f1}/{f2}', [ExportController::class, 'reportPDF']);
Route::get('report/pdf/{user}/{type}', [ExportController::class, 'reportPDF']);

//EXCEL
Route::get('report/excel/{user}/{type}/{f1}/{f2}', [ExportController::class, 'reporteExcel']);
Route::get('report/excel/{user}/{type}', [ExportController::class, 'reporteExcel']);

/* <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/factura.css') }}">
    <meta charset="UTF-8">
    <title>@yield('title', 'M.A.E S.A DE C.V')</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }
    </style>

</head>

<body>
    <table width="100%">
        <tr>
            <td valign="top"><img src="{{ asset('img/ma.png') }}" alt="" width="150" /></td>
            <td align="right">
                <h3>FACTURA</h3>
                <pre>
                M.A.E S.A DE C.V
                Col. san luis 
                EL SALVADOR
                +50378764325
                CEO
            </pre>
            </td>
        </tr>

    </table>

    <div class="card">
        <table width="100%">
            <tr>
                <td><strong>From:</strong> Linblum - Barrio teatral</td>
                <td><strong>To:</strong> Linblum - Barrio Comercial</td>
            </tr>

        </table>
    </div>

    <br />

    <div class="card">
        <div class="card-body">
            <table width="100%">
                <thead style="background-color: lightgray;">
                    <tr>
                        <th>#</th>
                        <th>PRODUCTO</th>
                        <th>CANTIDAD</th>
                        <th>IVA</th>
                        <th>SUB TOTAL</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($saleDetails as $detail)
                        <tr>
                            <th scope="row">{{ $detail->id }}</th>
                            <td>{{ $detail->product->name }}</td>
                            <td align="right">{{ $detail->quantity }}</td>
                            <td align="right">${{ number_format($detail->sale->iva, 2) }}</td>
                            <td align="right">${{ number_format($detail->price, 2) }}</td>
                            <td align="right">
                                ${{ number_format($detail->quantity * $detail->price * (1 + $iva), 2) }}</td>
                            </td>
                        </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3"></td>
                        <td align="right">Subtotal $</td>
                        <td align="right">${{ number_format($detail->quantity * $detail->price * (1 + $iva), 2) }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td align="right">IVA $</td>
                        <td align="right">${{ $detail->sale->iva }}</td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td align="right">Total $</td>
                        <td align="right">${{ number_format($sale->total * (1 + $iva), 2) }}</td>
                    </tr>
                </tfoot>
                @endforeach
            </table>
        </div>
    </div>

</body>

</html>
 */