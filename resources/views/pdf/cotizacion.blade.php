<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>COTIZACION</title>
    <style>
        body {
            font-family: Helvetica, sans-serif, Arial;
            font-size: 14px;
        }

        .header {
            text-align: center;
            margin-bottom: 16px;
        }

        .header h1 {
            font-size: 24px;
            margin: 0;
        }

        .info {
            margin-bottom: 20px;
        }

        .info table {
            width: 100%;
            border-collapse: collapse;
        }

        .info table td {
            padding: 5px;
        }

        .items {
            margin-bottom: 20px;
        }

        .items table {
            width: 100%;
            border-collapse: collapse;
        }

        .items table thead th {
            background-color: #f2f2f2;
            text-align: center;
            padding: 4px;
        }

        .items table tbody td {
            padding: 6px;
        }

        .items table tbody td.text-right {
            text-align: right;
        }

        .items table tbody td.text-left {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="ccf-original" style="margin-top: 60px;">
        <center>
            <img src="{{ asset('img/ol.png') }}" alt="" width="40px;" height="40px;">
        </center>
        <h6>SOLUMAQ S.A DE C.V</h6>
        <h6>Direccion: San Salvador, El salvador.</h6>
        <h6>Telefono: (+503)7789-9987</h6>
        <div class="info">

            <table style="width: 100%;">
                <tr>
                    <td><strong>Cliente:</strong> {{$clients->name}}</td>
                    <td><strong>Dirección:</strong> {{$clients->direccion}}</td>
                    <td><strong>Fecha:</strong> {{date('d-m-Y')}}</td>
                </tr>
                <tr>
                    <td><strong>NIT:</strong> {{$clients->nit}}</td>
                    <td><strong>NRC:</strong> {{$clients->nrc}}</td>
                    <td><strong>GIRO:</strong> {{$clients->giro}}</td>
                </tr>
            </table>
        </div>

        <div class="items">
            <table style="width: 100%;">
                <thead>
                    <tr>
                        <th colspan="2" style="width: 10%;">Cantidad</th>
                        <th style="width: 50%;">Descripción</th>
                        <th colspan="2" style="width: 10%;">Precio unitario</th>
                        <th colspan="2" style="width: 10%;">Servicio</th>
                        <th colspan="2" style="width: 10%;">Venta exentas</th>
                        <th colspan="2" style="width: 10%;">Ventas gravadas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sumas = 0; $servicioTotal = 0; ?>
                    @foreach ($saleDetails as $detail)
                    <?php
                        $ventaExenta = $detail->quantity * $detail->price;
                        $servicioProducto = $detail->quantity * $detail->product->servicio;
                        $sumas += $ventaExenta;
                        $servicioTotal += $servicioProducto;
                        $iva = $detail->sale->iva;
                        $subtotal = $sumas + $iva + $servicioTotal;
                    ?>
                    <tr style="">
                        <td colspan="2" style="width: 10%; text-align: center;">{{ number_format($detail->quantity, 0)
                            }}</td>
                        <td style="width: 50%; text-align: left;">
                            {{ $detail->product->name }}
                            <p class="text-center">¿Servicio profesional?: {{ $detail->product->servico_obra }}</p>
                        </td>
                        <td colspan="2" style="width: 10%; text-align: right;">${{ number_format($detail->price, 2) }}
                        </td>
                        <td colspan="2" style="width: 10%; text-align: right;">${{ number_format($servicioProducto, 2)
                            }}</td>
                        <td colspan="2" style="width: 10%; text-align: right;">$0</td>
                        <td colspan="2" style="width: 10%; text-align: right;">${{ number_format($ventaExenta, 2) }}
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" rowspan="1" style="padding: 10px;">{{$numeroAletras}}</td>
                        <td colspan="2" style="text-align: right;">Sumas:</td>
                        <td colspan="2" style="text-align: right;"></td>
                        <td colspan="2" style="text-align: right;">${{ number_format($sumas, 2) }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" rowspan="1"
                            style="text-align: center; color: #f2f2f2; background: #222; padding: 6px;">VENTA MAYORES A
                            $400.00 RELLENAR INFORMACIÓN</td>
                        <td colspan="2" style="text-align: right; background: #f2f2f2;">IVA:</td>
                        <td colspan="2" style="text-align: right;"></td>
                        <td colspan="2" style="text-align: right;">${{ number_format($iva, 2) }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" rowspan="1">Entregado:</td>
                        <td colspan="2" style="text-align: right; background: #f2f2f2;">Subtotal:</td>
                        <td colspan="2" style="text-align: right;"></td>
                        <td colspan="2" style="text-align: right;">${{ number_format($subtotal, 2) }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" rowspan="1">Firma</td>
                        <td colspan="2" style="text-align: right; background: #f2f2f2;">Ventas exentas:</td>
                        <td colspan="2" style="text-align: right;"></td>
                        <td colspan="2" style="text-align: right;"></td>
                    </tr>
                    <tr>
                        <td colspan="3" rowspan="1">DUI:</td>
                        <td colspan="2" style="text-align: right; background: #f2f2f2;">Total Servicio:</td>
                        <td colspan="2" style="text-align: right;">${{ number_format($servicioTotal, 2) }}</td>
                        <td colspan="2" style="text-align: right;"></td>
                    </tr>
                    <tr>
                        <td colspan="3" rowspan="1"></td>
                        <td colspan="2" style="text-align: right; background: #f2f2f2;">Venta Total:</td>
                        <td colspan="2" style="text-align: right;"></td>
                        <td colspan="2" style="text-align: right;">${{ number_format($subtotal, 2) }}</td>
                    </tr>
                </tbody>
            </table>
            <p style="text-align: right;">Original emisor</p>
        </div>
    </div>
    <div class="ccf-original" style="margin-top: 60px;">

        <div class="info">
            <table style="width: 100%;">
                <tr>
                    <td><strong>Cliente:</strong> {{$clients->name}}</td>
                    <td><strong>Dirección:</strong> {{$clients->direccion}}</td>
                    <td><strong>Fecha:</strong> {{date('d-m-Y')}}</td>
                </tr>
            </table>
        </div>

        <div class="items">
            <table style="width: 100%;">
                <thead>
                    <tr>
                        <th colspan="2" style="width: 10%;">Cantidad</th>
                        <th style="width: 50%;">Descripción</th>
                        <th colspan="2" style="width: 10%;">Precio unitario</th>
                        <th colspan="2" style="width: 10%;">Servicio</th>
                        <th colspan="2" style="width: 10%;">Venta exentas</th>
                        <th colspan="2" style="width: 10%;">Ventas gravadas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sumas = 0; $servicioTotal = 0; ?>
                    @foreach ($saleDetails as $detail)
                    <?php
                        $ventaExenta = $detail->quantity * $detail->price;
                        $servicioProducto = $detail->quantity * $detail->product->servicio;
                        $sumas += $ventaExenta;
                        $servicioTotal += $servicioProducto;
                        $iva = $detail->sale->iva;
                        $subtotal = $sumas + $iva + $servicioTotal;
                    ?>
                    <tr style="">
                        <td colspan="2" style="width: 10%; text-align: center;">{{ number_format($detail->quantity, 0)
                            }}</td>
                        <td style="width: 50%; text-align: left;">{{ $detail->product->name }}</td>
                        <td colspan="2" style="width: 10%; text-align: right;">${{ number_format($detail->price, 2) }}
                        </td>
                        <td colspan="2" style="width: 10%; text-align: right;">${{ number_format($servicioProducto, 2)
                            }}</td>
                        <td colspan="2" style="width: 10%; text-align: right;">$0</td>
                        <td colspan="2" style="width: 10%; text-align: right;">${{ number_format($ventaExenta, 2) }}
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" rowspan="1" style="padding: 10px;">{{$numeroAletras}}</td>
                        <td colspan="2" style="text-align: right;">Sumas:</td>
                        <td colspan="2" style="text-align: right;"></td>
                        <td colspan="2" style="text-align: right;">${{ number_format($sumas, 2) }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" rowspan="1"
                            style="text-align: center; color: #f2f2f2; background: #222; padding: 6px;">VENTA MAYORES A
                            $400.00 RELLENAR INFORMACIÓN</td>
                        <td colspan="2" style="text-align: right; background: #f2f2f2;">IVA:</td>
                        <td colspan="2" style="text-align: right;"></td>
                        <td colspan="2" style="text-align: right;">${{ number_format($iva, 2) }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" rowspan="1">Entregado:</td>
                        <td colspan="2" style="text-align: right; background: #f2f2f2;">Subtotal:</td>
                        <td colspan="2" style="text-align: right;"></td>
                        <td colspan="2" style="text-align: right;">${{ number_format($subtotal, 2) }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" rowspan="1">Firma</td>
                        <td colspan="2" style="text-align: right; background: #f2f2f2;">Ventas exentas:</td>
                        <td colspan="2" style="text-align: right;"></td>
                        <td colspan="2" style="text-align: right;"></td>
                    </tr>
                    <tr>
                        <td colspan="3" rowspan="1">DUI:</td>
                        <td colspan="2" style="text-align: right; background: #f2f2f2;">Total Servicio:</td>
                        <td colspan="2" style="text-align: right;">${{ number_format($servicioTotal, 2) }}</td>
                        <td colspan="2" style="text-align: right;"></td>
                    </tr>
                    <tr>
                        <td colspan="3" rowspan="1"></td>
                        <td colspan="2" style="text-align: right; background: #f2f2f2;">Venta Total:</td>
                        <td colspan="2" style="text-align: right;"></td>
                        <td colspan="2" style="text-align: right;">${{ number_format($subtotal, 2) }}</td>
                    </tr>
                </tbody>
            </table>
            <p style="text-align: right;">Original Cliente</p>
        </div>
    </div>
</body>

</html>