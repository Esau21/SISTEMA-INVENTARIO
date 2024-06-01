<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .invoice-box {
            width: 800px;
            height: 970px;
            margin: auto;
            padding: 20px;
            border: 2px solid #000;
            font-size: 12px;
            line-height: 18px;
            color: #000;
            position: relative;
            box-sizing: border-box;
        }

        .invoice-box img.logo {
            width: 150px;
        }

        .invoice-box img.background {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300px;
            height: auto;
            transform: translate(-50%, -50%);
            opacity: 0.1;
            z-index: -1;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }

        .invoice-box table td,
        .invoice-box table th {
            padding: 5px;
            border: 1px solid #000;
            vertical-align: top;
        }

        .invoice-box table tr.heading th {
            background: #eee;
            border-bottom: 2px solid #000;
            font-weight: bold;
            text-align: center;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #000;
        }

        .right-text {
            text-align: right;
        }

        .center-text {
            text-align: center;
        }

        .bordered {
            border: 1px solid #000;
        }

        .top-title {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }

        .sub-title {
            font-size: 12px;
            text-align: center;
        }

        .table-section {
            margin-bottom: 20px;
        }

        @page {
            size: 300mm 400mm;
            margin: 10px;
        }

        .code-vertical {
            writing-mode: vertical-rl;
            transform: rotate(180deg);
            text-align: center;
            font-size: 14px;
            margin-left: 10px;
        }

        /* Ajuste del ancho de la columna de descripción */
        .invoice-box table td.description {
            width: 40%;
        }

        /* Ajustes adicionales para evitar desbordamiento */
        .top-right {
            max-width: 250px;
            padding: 10px;
        }

        .top-right .bordered {
            padding: 2px;
        }

        .top-right .vertical-text {
            writing-mode: vertical-rl;
            transform: rotate(180deg);
            font-size: 14px;
            white-space: nowrap;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="6" style="border:none;">
                    <table>
                        <tr>
                            <td style="border:none;">
                                <img src="{{ asset('img/ol.png') }}" class="logo">
                            </td>
                            <td style="border:none; text-align:center;">
                                <div class="top-title">SOLUMAQ S.A DE C.V</div>
                                <div class="sub-title">CARRETERA A LOS PLANES DE RENDEROS, KM 3 INTERPRETACION AUTOPISTA
                                    COMALAPA SAN SALVADOR, EL SALVADOR.</div>
                                <div class="sub-title">Teléfono: 7541-3365</div>
                                <div class="sub-title">Correo: progresamasuls@gmail.com</div>
                            </td>
                            <td class="top-right" style="border: 1px solid #000;">
                                <div class="top-title" style="font-size: 18px; font-weight: bold; text-align: center;">
                                    FACTURA</div>
                                    <div style="margin-top: 5px; text-align: center;">
                                        No. <span class="bordered" style="border: 3px solid #FF0000; padding: 3px;">{{ $cotizacion->id }}</span>
                                    </div>
                                    
                                <div style="margin-top: 5px;">N.R.C.: {{ $clientes->nrc }}</div>
                                <div style="margin-top: 5px;">NIT: {{ $clientes->nit }}</div>
                                <div style="margin-top: 5px; display: flex; justify-content: flex-end;">
                                    <div class="horizontal-text">20ST000F1</div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="6" style="border:none;">
                    <table>
                        <tr>
                            <td style="border:none;">
                                <table>
                                    <tr>
                                        <td>Día:</td>
                                        <td><span>
                                            {{date('d')}}</span>
                                        </td>
                                        <td>Mes:</td>
                                        <td><span>{{date('m')}}
                                            </span></td>
                                        <td>Año:</td>
                                        <td><span>
                                            {{date('Y')}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nombre:</td>
                                        <td colspan="5">{{ $clientes->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>D.U.I. ó N.I.T.:</td>
                                        <td colspan="5">{{$clientes->nit}}</td>
                                    </tr>
                                    <tr>
                                        <td>Dirección:</td>
                                        <td colspan="5">{{ $clientes->direccion }}</td>
                                    </tr>
                                    <tr>
                                        <td>Venta a cuenta de:</td>
                                        <td colspan="5">{{ Auth::user()->name }}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table>
            <tr class="heading">
                <th class="center-text">#</th>
                <th class="center-text description">ARTICULO(DESCRIPCION)</th>
                <th class="center-text">PRECIO UNITARIO</th>
                <th class="center-text">VENTAS NO SUJ.</th>
                <th class="center-text">VENTAS EXENTAS</th>
                <th class="center-text">VENTAS GRAVADAS</th>
            </tr>
            <!-- Agrega aquí las filas de items según sea necesario -->
            <tr class="item">
                <td class="center-text">{{ $cotizacion->id }}</td>
                <td class="description">
                    {{ $cotizacion->nombrepro }}
                </td>
                <td class="right-text">${{number_format($cotizacion->price, 2)}}</td>
                <td class="right-text">$0.00</td>
                <td class="right-text">$0.00</td>
                <td class="right-text">${{ number_format($cotizacion->price, 2) }}</td>
            </tr>
            <!-- Agrega más filas aquí -->
            <!-- Añadimos más filas para simular 15 líneas -->
            <tr class="item">
                <td class="center-text"></td>
                <td class="description">
                    ¿Servicio profesional?: {{ $cotizacion->manoobra }}
                </td>
                <td class="right-text">
                    Total: {{ $cotizacion->total_manoobra }}
                </td>
                <td class="right-text"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
            </tr>
            <tr class="item">
                <td class="center-text"></td>
                <td class="description"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
            </tr>
            <tr class="item">
                <td class="center-text"></td>
                <td class="description"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
            </tr>
            <tr class="item">
                <td class="center-text"></td>
                <td class="description"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
            </tr>
            <tr class="item">
                <td class="center-text"></td>
                <td class="description"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
            </tr>
            <tr class="item">
                <td class="center-text"></td>
                <td class="description"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
            </tr>
            <tr class="item">
                <td class="center-text"></td>
                <td class="description"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
            </tr>
            <tr class="item">
                <td class="center-text"></td>
                <td class="description"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
            </tr>
            <tr class="item">
                <td class="center-text"></td>
                <td class="description"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
            </tr>
            <tr class="item">
                <td class="center-text"></td>
                <td class="description"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
            </tr>
            <tr class="item">
                <td class="center-text"></td>
                <td class="description"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
            </tr>
            <tr class="item">
                <td class="center-text"></td>
                <td class="description"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
            </tr>
            <tr class="item">
                <td class="center-text"></td>
                <td class="description"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
            </tr>
            <tr class="item">
                <td class="center-text"></td>
                <td class="description"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
            </tr>
            <tr class="item">
                <td class="center-text"></td>
                <td class="description"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
                <td class="right-text"></td>
            </tr>
        </table>
        <table>
            <tr>
                <td rowspan="5" class="bordered" style="width: 50%;">
                    <strong>SON:</strong> ${{ number_format($cotizacion->total, 2) }}<br><br>
                    <strong>C/C:</strong> _______________________________<br><br>
                    <strong>LLENAR SI LA OPERACIÓN ES IGUAL O SUPERIOR A $200.00</strong><br><br>
                    <strong>Entregado por:</strong>SOLUMAQ S.A DE C.V<br>
                    <strong>Nombre:</strong> {{ Auth::user()->name }}<br>
                    <strong>DUI:</strong> _______________________________<br>
                    <strong>Firma:</strong> _______________________________<br><br>
                    <strong>Recibido por:</strong> SOLUMAQ S.A DE C.V<br>
                    <strong>Nombre:</strong> {{ $clientes->name }}<br>
                    <strong>DUI o NIT:</strong> {{ $clientes->nit }}<br>
                    <strong>Firma:</strong> _______________________________
                </td>
                <td class="right-text bordered">SUMAS</td>
                <td class="right-text bordered">${{number_format($cotizacion->price, 2)}}</td>
            </tr>
            <tr>
                <td class="right-text bordered">VENTA EXENTA</td>
                <td class="right-text bordered">$0.00</td>
            </tr>
            <tr>
                <td class="right-text bordered">VENTA NO SUJETA</td>
                <td class="right-text bordered">$0.00</td>
            </tr>
            <tr>
                <td class="right-text bordered">(-) IVA RETENIDO</td>
                <td class="right-text bordered">${{number_format($cotizacion->iva, 2)}}</td>
            </tr>
            <tr>
                <td class="right-text bordered"><strong>VENTA TOTAL</strong></td>
                <td class="right-text bordered"><strong>${{ number_format($cotizacion->total + $cotizacion->total_manoobra, 2) }}</strong></td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="bordered">Hecho por: SOLUMAQ S.A DE C.V</td>
                <td class="bordered">Revisado por: {{ Auth::user()->name }}</td>
                <td class="bordered">Autorizado por: SOLUMAQ S.A DE C.V</td>
            </tr>
        </table>
    </div>
</body>

</html>