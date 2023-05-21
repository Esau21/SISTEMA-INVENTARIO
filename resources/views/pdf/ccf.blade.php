

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Comprobante de Crédito Fiscal</title>
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
<!--         <div class="header">
            <h1>Comprobante de Crédito Fiscal</h1>
        </div> -->

        <div class="info">
            <table style="width: 100%;">
                <tr>
                    <td><strong>Cliente:</strong> La Cascada S.A DE C.V</td>
                    <td><strong>Dirección:</strong> San Salvador, calle principal</td>
                    <td><strong>Fecha:</strong> 18-05-2023</td>
                </tr>
                <tr>
                    <td><strong>NIT:</strong> 0001-234567-890-1</td>
                    <td><strong>NRC:</strong> 89834-1</td>
                    <td><strong>GIRO:</strong> Venta al por mayor de refresco</td>
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
                        <th colspan="2" style="width: 10%;">Venta exentas</th>
                        <th colspan="2" style="width: 10%;">Ventas gravadas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($saleDetails as $detail)
                    <tr style="">
                        <td colspan="2" style="width: 10%; text-align: center; ">{{ $detail->quantity }}</td>
                        <td style="width: 50%; text-align: left;">{{ $detail->sale->user->name }}</td>
                        <td colspan="2" style="width: 10%; text-align: right; ">${{ number_format($detail->price, 2) }}</td>
                        <td colspan="2" style="width: 10%; text-align: right; ">
                            $0</td>
                        <td colspan="2" style="width: 10%; text-align: right; ">$</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" rowspan="1" style="padding:10px">SON VEINTE DOLARES CON CERO CENTAVOS</td>
                        <td colspan="2" style="text-align: right;">Sumas:</td>
                        <td colspan="2" style="text-align: right;"></td>
                        <td colspan="2" style="text-align: right;">$</td>
                    </tr>
                    <tr>
                        <td colspan="3" rowspan="1" style="text-align: center; color: #f2f2f2; background:#222;padding:6px">VENTA MAYORES A $400.00 RELLENAR INFORMACIÓN</td>
                        <td colspan="2" style="text-align: right;background:#f2f2f2">IVA:</td>
                        <td colspan="2" style="text-align: right;"></td>
                        <td colspan="2" style="text-align: right;">$</td>
                    </tr>
                    <tr>
                        <td colspan="3" rowspan="1">Entregado:</td>
                        <td colspan="2" style="text-align: right; background:#f2f2f2">Subtotal:</td>
                        <td colspan="2" style="text-align: right;"></td>
                        <td colspan="2" style="text-align: right;">$20.00</td>
                    </tr>
                    <tr>
                        <td colspan="3" rowspan="1">Firma</td>
                        <td colspan="2" style="text-align: right; background:#f2f2f2">Ventas exentas:</td>
                        <td colspan="2" style="text-align: right;"></td>
                        <td colspan="2" style="text-align: right;"></td>
                    </tr>
                    <tr>
                        <td colspan="3" rowspan="1">DUI:</td>
                        <td colspan="2" style="text-align: right; background:#f2f2f2">Venta Total:</td>
                        <td colspan="2" style="text-align: right;"></td>
                        <td colspan="2" style="text-align: right;">$20.00</td>
                    </tr>
                </tbody>
            </table>
            <p style="text-align: right;">Original emisor</p>
        </div>
    </div>

    <div class="ccf-original" style="margin-top: 60px;">
<!--         <div class="header">
            <h1>Comprobante de Crédito Fiscal</h1>
        </div> -->

        <div class="info">
            <table style="width: 100%;">
                <tr>
                    <td><strong>Cliente:</strong> La Cascada S.A DE C.V</td>
                    <td><strong>Dirección:</strong> San Salvador, calle principal</td>
                    <td><strong>Fecha:</strong> 18-05-2023</td>
                </tr>
                <tr>
                    <td><strong>NIT:</strong> 0001-234567-890-1</td>
                    <td><strong>NRC:</strong> 89834-1</td>
                    <td><strong>GIRO:</strong> Venta al por mayor de refresco</td>
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
                        <th colspan="2" style="width: 10%;">Venta exentas</th>
                        <th colspan="2" style="width: 10%;">Ventas gravadas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="">
                        <td colspan="2" style="width: 10%; text-align: center; ">2</td>
                        <td style="width: 50%; text-align: left;">Producto 1</td>
                        <td colspan="2" style="width: 10%; text-align: right; ">$10.00</td>
                        <td colspan="2" style="width: 10%; text-align: right; ">
                            $0</td>
                        <td colspan="2" style="width: 10%; text-align: right; ">$10.00</td>
                    </tr>
                    <tr style="">
                        <td colspan="2" style="width: 10%; text-align: center; ">2</td>
                        <td style="width: 50%; text-align: left;">Producto 2</td>
                        <td colspan="2" style="width: 10%; text-align: right; ">$10.00</td>
                        <td colspan="2" style="width: 10%; text-align: right; ">
                            $0</td>
                        <td colspan="2" style="width: 10%; text-align: right; ">$10.00</td>
                    </tr>
                    <tr>
                        <td colspan="3" rowspan="1" style="padding:10px">SON VEINTE DOLARES CON CERO CENTAVOS</td>
                        <td colspan="2" style="text-align: right;">Sumas:</td>
                        <td colspan="2" style="text-align: right;"></td>
                        <td colspan="2" style="text-align: right;">$20.00</td>
                    </tr>
                    <tr>
                        <td colspan="3" rowspan="1" style="text-align: center; color: #f2f2f2; background:#222;padding:6px">VENTA MAYORES A $400.00 RELLENAR INFORMACIÓN</td>
                        <td colspan="2" style="text-align: right;background:#f2f2f2">IVA:</td>
                        <td colspan="2" style="text-align: right;"></td>
                        <td colspan="2" style="text-align: right;">$0.00</td>
                    </tr>
                    <tr>
                        <td colspan="3" rowspan="1">Entregado:</td>
                        <td colspan="2" style="text-align: right; background:#f2f2f2">Subtotal:</td>
                        <td colspan="2" style="text-align: right;"></td>
                        <td colspan="2" style="text-align: right;">$20.00</td>
                    </tr>
                    <tr>
                        <td colspan="3" rowspan="1">Firma</td>
                        <td colspan="2" style="text-align: right; background:#f2f2f2">Ventas exentas:</td>
                        <td colspan="2" style="text-align: right;"></td>
                        <td colspan="2" style="text-align: right;"></td>
                    </tr>
                    <tr>
                        <td colspan="3" rowspan="1">DUI:</td>
                        <td colspan="2" style="text-align: right; background:#f2f2f2">Venta Total:</td>
                        <td colspan="2" style="text-align: right;"></td>
                        <td colspan="2" style="text-align: right;">$20.00</td>
                    </tr>
                </tbody>
            </table>
            <p style="text-align: right;">Cliente emisor</p>
        </div>
    </div>

</body>

</html>