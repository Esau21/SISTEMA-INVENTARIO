<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/factura.css') }}">
    <meta charset="UTF-8">
    <title>@yield('title', 'M.A.E S.A DE C.V')</title>


</head>

<body>
    <header class="row">
        <div class="logoholder text-center">
            <img src="{{ asset('img/ma.png') }}" alt="LOGO" width="70px;" height="70px;">
        </div>
        <!--.logoholder-->

        <div class="me">
            <p contenteditable>
                <strong>M.A.E S.A. de C.V.</strong><br>
                El salvador<br>
                Grupo 9<br>

            </p>
        </div>
        <!--.me-->

        <div class="info">
            <p contenteditable>
                Web: <a href="https:carwash-mae.xyz">https:carwash-mae.xyz</a><br>
                E-mail: <a href="mailto:info@obedalvarado.pw">maesv123@gmail.com</a><br>
                Tel: +503-78676767<br>
                Twitter: @maesv123
            </p>
        </div><!-- .info -->

    </header>

    <div class="card mb-4">
        <table width="100%">
            <tr>
                <td><strong>M.A.E:</strong>Gracias pro preferirnos</td>
                <td><strong>SERVICIOS PROFESIONALES:</strong> M.A.E S.A DE C.V</td>
            </tr>
        </table>
    </div>

    <br />

    <div class="card">
        <div class="card-header">
            <h6 class="text-left text-uppercase" style="color: #3B3F5C">DETALLES DE LA FACTURA</h6>
        </div>
        <div class="card-body">
            <table width="100%">
                <thead style="background-color: lightgray;">
                    <tr invoice_detail>
                        <th>#</th>
                        <th>CLIENTE</th>
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
                            <td align="center">{{ $detail->sale->user->name }}</td>
                            <td align="center">{{ $detail->product->name }}</td>
                            <td align="center">{{ $detail->quantity }}</td>
                            <td align="center">${{ number_format($detail->sale->iva, 2) }}</td>
                            <td align="center">${{ number_format($detail->price, 2) }}</td>
                            <td align="center">
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
