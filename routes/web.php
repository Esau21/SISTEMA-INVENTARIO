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
use App\Http\Livewire\CotizacionController;
use App\Http\Livewire\CotizationController;
use App\Http\Livewire\FacturacionController;
use App\Http\Livewire\Graficos\GraficosComponent;
use App\Http\Livewire\MaquinariaController;
use App\Http\Livewire\ReportsMaquinariasController;
use App\Http\Livewire\ReportsServicesController;
use App\Http\Livewire\StockController;
use App\Http\Livewire\UsersController;
use App\Models\Cotization;
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
    Route::get('graficos', [GraficosComponent::class, 'graficos']);
    Route::get('products', ProductsController::class);
    Route::get('coins', CoinsController::class);
    Route::get('pos', PosController::class);
    Route::get('/ticket/{saleId}/{type_docs}', [PosController::class, 'printTicket'])->name('ticket');
    Route::get('/factura/{cotiId}', [CotizationController::class, 'PdfCoti'])->name('coti');
    Route::get('maquinarias', MaquinariaController::class);
    Route::get('cotizaciones', CotizationController::class);
    Route::get('/feacture/{saleMaquinariaId}', [MaquinariaController::class, 'printFactura'])->name('maquinaria');


    Route::group(['middleware' => ['role:Admin']], function () {
    });
    Route::get('roles', RolesController::class);
    Route::get('permisos', PermisosController::class);
    Route::get('asignar', AsignarController::class);
    Route::get('users', UsersController::class);
    Route::get('cashout', CashoutController::class);
    Route::get('reports', ReportsController::class);
    Route::get('reportesmaquinarias', ReportsMaquinariasController::class);
    Route::get('reportsservices', ReportsServicesController::class);
    Route::get('clientes', ClienteController::class);
});

//NEW ROUTE
Route::get('/stock', StockController::class);
//REPORTES
Route::get('report/pdf/{user}/{type}/{f1}/{f2}', [ExportController::class, 'reportPDF']);
Route::get('report/pdf/{user}/{type}', [ExportController::class, 'reportPDF']);
Route::get('reportesmaqui/pdf/{cliente}/{type}', [ExportController::class, 'reportMaquinariaPdf']);
Route::get('reportesmaqui/pdf/{cliente}/{type}/{f1}/{f2}', [ExportController::class, 'reportMaquinariaPdf']);
Route::get('reporteservices/pdf/{user}/{type}', [ExportController::class, 'ManoObraPdf']);
Route::get('reporteservices/pdf/{user}/{type}/{f1}/{f2}', [ExportController::class, 'ManoObraPdf']);
//EXCEL
Route::get('report/excel/{user}/{type}/{f1}/{f2}', [ExportController::class, 'reporteExcel']);
Route::get('report/excel/{user}/{type}', [ExportController::class, 'reporteExcel']);
