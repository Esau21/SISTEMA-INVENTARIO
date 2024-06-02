<?php

namespace App\Http\Livewire;

use App\Models\Clientes;
use Livewire\Component;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\Denomination;
use App\Models\Product;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Sale;
use App\Models\User;
use App\Models\SaleDetails;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Exception;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Luecano\NumeroALetras\NumeroALetras;

class PosController extends Component
{
    public $total, $itemsQuantity, $efectivo, $change, $iva, $totalConIva, $cliente_id, $tipo_docs;


    public function mount()
    {
        $this->efectivo = 0;
        $this->change = 0;
        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
    }

    public function render()
    {
        $clientes = Clientes::orderBy('id', 'desc')->paginate(10);
        return view('livewire.pos.component', [
            'denominations' => Denomination::orderBy('value', 'desc')->get(),
            'cart' => Cart::getContent()->sortBy('name'),
            'clientes' => $clientes
        ])
            ->extends('layouts.theme.app')
            ->section('content');
    }

    /* public function ACash($value)
    {
        $this->efectivo += ($value == 0 ? $this->total : $value);
        $this->change = ($this->efectivo - $this->total);
    } */

    public function Iva($value)
    {
        $iva = 0.13;

        $precioProducto = ($value == 0 ? $this->total : $value);
        $montoIva = $precioProducto * $iva;
        $this->totalConIva = $precioProducto + $montoIva;
        $this->efectivo += $precioProducto + $montoIva;
    }


    protected $listeners = [
        'scan-code' => 'ScanCode',
        'removeItem' => 'removeItem',
        'clearCart' => 'clearCart',
        'saveSale' => 'saveSale',
        'reload-page' => '$refresh',
    ];

    public function ScanCode($barcode, $cant = 1)
    {
        //dd($barcode); 
        $product = Product::where('barcode', $barcode)->first();

        if ($product == null || empty($product)) {
            $this->emit('scan-notfound', 'El producto no esta registrado');
        } else {

            if ($this->InCart($product->id)) {
                $this->increaseQty($product->id);
                return;
            }

            if ($product->stock < 1) {
                $this->emit('no-stock', 'Stock insuficiente');
                return;
            }

            Cart::add($product->id, $product->name, $product->price, $cant, $product->image);
            $this->total = Cart::getTotal();

            $this->emit('scan-ok', 'Producto agregado');
        }
    }

    public function InCart($productId)
    {
        $exist = Cart::get($productId);
        if ($exist)
            return true;
        else
            return false;
    }

    public function increaseQty($productId, $cant = 1)
    {
        $title = '';
        $product = Product::find($productId);
        $exist = Cart::get($productId);
        if ($exist)
            $title = 'Cantidad Actualizada';
        else
            $title = 'Producto Agregado';

        if ($exist) {
            if ($product->stock < ($cant + $exist->quantity)) {
                $this->emit('no-stock', 'Stock Insuficiente');
                return;
            }
        }

        Cart::add($product->id, $product->name, $product->price, $cant, $product->image);

        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();

        $this->emit('scan-ok', $title);
    }

    public function updateQty($productId, $cant = 1)
    {
        $title = '';
        $product = Product::find($productId);
        $exist = Cart::get($productId);
        if ($exist)
            $title = 'Cantidad Actualizada';
        else
            $title = 'Producto Agregado';

        if ($exist) {
            if ($product->stock < $cant) {
                $this->emit('no-stock', 'Stock Insuficiente');
                return;
            }
        }

        $this->removeItem($productId);

        if ($cant > 0) {
            Cart::add($product->id, $product->name, $product->price, $cant, $product->image);

            $this->total = Cart::getTotal();
            $this->itemsQuantity = Cart::getTotalQuantity();

            $this->emit('scan-ok', $title);
        }
    }

    public function removeItem($productId)
    {
        Cart::remove($productId);

        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();

        $this->emit('scan-ok', 'Producto Eliminado');
    }

    public function decreaseQty($productId)
    {
        $item = Cart::get($productId);
        Cart::remove($productId);

        $newQty = ($item->quantity) - 1;

        if ($newQty > 0)
            Cart::add($item->id, $item->name, $item->price, $newQty, $item->attributes[0]);


        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();

        $this->emit('scan-ok', 'Cantidad Actualizada');
    }

    public function clearCart()
    {
        Cart::clear();
        $this->efectivo = 0;
        $this->change = 0;

        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
        $this->emit('scan-ok', 'Carrito Vacio');
    }

    public function saveSale()
    {
        if ($this->total <= 0) {
            $this->emit('sale-error', 'AGREGAR PRODUCTOS A LA VENTA');
            return;
        }
        if ($this->efectivo <= 0) {
            $this->emit('sale-error', 'INGRESA EL EFECTIVO');
            return;
        }
        if ($this->total > $this->efectivo) {
            $this->emit('sale-error', 'EL EFECTIVO DEBE SER MAYOR O IGUAL AL TOTAL');
            return;
        }
        if ($this->cliente_id == "") {
            $this->emit('err-empty', 'POR FAVOR, SELECCIONA UN CLIENTE!!');
            return 0;
        }
        if ($this->tipo_docs == "") {
            $this->emit('err-type_docs', 'POR FAVOR, SELECCIONA UN TIPO DE DOCUMENTO (CCF, Cotizacion o Factura)!!');
            return 0;
        }

        DB::beginTransaction();

        try {

            $iva = 0.13;
            $totalConIva = $this->total * (1 + $iva);
            $montoIva = $totalConIva - $this->total;

            $sale = Sale::create([
                'total' => $this->total,
                'items' => $this->itemsQuantity,
                'cash' => $this->efectivo,
                'change' => $this->change,
                'iva' => $montoIva,
                'user_id' => Auth()->user()->id,
                'cliente_id' => $this->cliente_id
            ]);

            if ($sale) {
                $items = Cart::getContent();
                foreach ($items as $item) {
                    SaleDetails::create([
                        'price' => $item->price,
                        'quantity' => $item->quantity,
                        'product_id' => $item->id,
                        'sale_id' => $sale->id,
                    ]);

                    //Update a stock
                    $product = Product::find($item->id);
                    $product->stock = $product->stock - $item->quantity;
                    $product->save();
                }
            }

            DB::commit();

            Cart::clear();
            $this->efectivo = 0;
            $this->change = 0;
            $this->total = Cart::getTotal();
            $this->itemsQuantity = Cart::getTotalQuantity();
            $this->emit('sale-ok', 'VENTA REGISTRADA CON EXITO, REVISA TU FACTURA DE VENTA.');
            $this->emit('print-ticket', $sale->id);
            $this->emit('reload-page');
        } catch (Exception $e) {
            DB::rollback();
            $this->emit('sale-error', $e->getMessage());
        }
        if (isset($sale)) {
            return redirect()->route('ticket', ['saleId' => $sale->id, 'type_docs' => $this->tipo_docs]);
        }
    }



    public function printTicket($saleId, $type_docs)
    {
        $sale = Sale::find($saleId);
        $clients = Clientes::find($sale->cliente_id);
        $saleDetails = SaleDetails::where('sale_id', $saleId)->get();

        $iva = 0.13;
        $servicioTotal = $sale->servicio; // Obtén el total del servicio de la venta

        $ivaCalcular = $this->Iva($sale->total * $iva);
        $TotalconIva = $sale->total + $ivaCalcular + $servicioTotal;

        // Totales
        $sumas = 0;
        foreach ($saleDetails as $detail) {
            $ventaExenta = $detail->quantity * $detail->price;
            $sumas += $ventaExenta;
            $iva = $detail->sale->iva;
            $subtotal = $sumas + $iva + $servicioTotal;
        }

        $formatter = new NumeroALetras();
        $numeroAletras = $formatter->toMoney(number_format($subtotal, 2, '.', ''), 2, 'DÓLARES', 'CENTAVOS');

        if ($type_docs == 'ccf') {
            $pdf = PDF::loadView('pdf.ccf', compact('sale', 'saleDetails', 'iva', 'TotalconIva', 'numeroAletras', 'clients'));
            return $pdf->stream('ccf.pdf');
        } elseif ($type_docs == 'cotizacion') {
            $pdf = PDF::loadView('pdf.cotizacion', compact('sale', 'saleDetails', 'iva', 'TotalconIva', 'numeroAletras', 'clients'));
            return $pdf->stream('cotizacion.pdf');
        } else {
            $pdf = PDF::loadView('pdf.factura', compact('sale', 'saleDetails', 'iva', 'TotalconIva', 'numeroAletras', 'clients'));
            return $pdf->stream('factura.pdf');
        }
    }
}
