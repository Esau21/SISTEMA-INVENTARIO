<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reportes de servicios al cliente</title>
    <link rel="stylesheet" href="{{ asset('css/custom_pdf.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom_page.css') }}">
</head>
<body>
    <section class="header" style="top: -287px;">
        <table cellpadding="0" cellspacing="0" width="100%" class="table table-striped table">
            <tr>
                <td align="center" colspan="2" class="text-center">
                    <span style="font-size: 25px; font-weight: bold">REPORTE DE SERVICOS</span>
                </td align="center">
            </tr>
            <tr>
                <td align="center" width="30%" style="vertical-align: top; padding-top: 10px; position: relative;">
                    <img src="{{ asset('img/ol.png') }}" alt="" class="invoice-logo">
                </td align="center">
                <td align="center" width="70%" class="text-left text-company" style="vertical-align: top; padding-top: 10px;">
                    @if($reportType == 0)
                        <span style="font-size: 16px;"><strong>Reporte de servicios del dia</strong></span>
                    @else
                        <span style="font-size: 16px;"><strong>Reporte de servicios por fecha</strong></span>
                    @endif
                    <br>
                    @if($reportType !=0)
                    <span style="font-size: 16px;"><strong>Fecha de Consulta: {{$dateFrom}} al {{$dateTo}}</strong></span>
                    @else
                    <span style="font-size: 16px;"><strong>Fecha de Consulta: {{ \Carbon\Carbon::now()->format('Y-m-d') }}</strong></span>
                    @endif
                    <br>
                    <span style="font-size: 14px;">Usuario: {{$user}}</span>
                </td align="center">
            </tr>
        </table>
    </section>

    <section style="margin-top: -110px;">
        <table cellpadding="0" cellspacing="0" class="table-items" width="100%">
            <thead>
                <tr>
                    <th width="10%">FOLIO</th>
                    <th width="12%">TOTAL</th>
                    <th width="10%">MANO OBRA</th>
                    <th width="12%">PRODUCTO</th>
                    <th>USUARIO</th>
                    <th width="18%">FECHA</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                    <tr>
                        <td align="center">{{$item->id}}</td>
                        <td align="center">${{number_format($item->total,2)}}</td>
                        <td align="center">{{$item->manoobra}}</td>
                        <td align="center">{{$item->nombrepro}}</td>
                        <td align="center">{{$item->username}}</td>
                        <td align="center">{{$item->created_at}}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td class="text-center">
                        <span><b>TOTALES</b></span>
                    </td>
                    <td colspan="1" class="text-center">
                        <span><strong>${{number_format($data->sum('total'),2)}}</strong></span>
                    </td>
                    <td colspan="3" class="text-center"></td>
                </tr>
            </tfoot>
        </table>
    </section>

    <section class="footer">
        <table cellpadding="0" cellspacing="0" class="table-items" width="100%">
            <tr>
                <td width="20%">
                    <span>Sistema de Ventas</span>
                </td>
                <td class="text-center">
                    grupo.com
                </td>
                <td class="text-center" width="20%">
                    Pagina <span class="pagenum"></span>
                </td>
            </tr>
        </table>
    </section>
</body>
</html>