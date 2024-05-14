<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
    </style>

    <title>@yield('title', 'SOLUMAQ S.A DE C.V')</title>
</head>

<body>

    <section>
        <div class="text-center pt-3">
            <img class="mx-auto" src="{{ asset('img/ol.png') }}" width="50px;" alt="">
            <span>
                <h6 class="text-center text-dark">SOLUMAQ S.A DE C.V</h6>
                <h6 class="text-dark text-center">Direccion: San Salvador, El salvador</h6>
                <h6 class="text-dark text-center">Telefono: (+503)7789-9987</h6>
                <h6 class="text-right text-dark">#FACTURA: {{$maquinariasP->id}}</h6>
            </span>
        </div>
    </section>
    <hr>

    <section class="pt-3">
        <div class="text-left">
            <h6 class="text-left">DETALLES DEL CLIENTE</h6>
            <h6 class="text-left">CLIENTE: {{$clientes->name}}</h6>
            <h6 class="text-left">NIT: {{$clientes->nit}}</h6>
            <h6 class="text-left">DIRECCION: {{ $clientes->direccion }}</h6>
            <h6 class="text-left">NRC: {{$clientes->nrc}}</h6>
        </div>
        <div class="text-right">
            <h6 class="text-dark">Fecha: {{\Carbon\Carbon::parse($maquinariasP->fecha_salida)->format('d/m/Y') }}</h6>
        </div>
    </section>
    <hr>

    <section class="pt-3">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm">
                <thead>
                    <tr>
                        <th class="table-th text-dark">ALQUILER</th>
                        <th class="text-center text-dark">MODELO</th>
                        <th class="text-center text-dark">AÑO</th>
                        <th class="table-th text-center text-dark">DESCRIPCION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center text-dark">
                            <span>
                                <p class="text-sm text-dark text-center">{{ $maquinariasP->name }}</p>
                            </span>
                        </td>
                        <td class="text-center text-dark text-sm">{{$maquinariasP->model}}</td>
                        <td class="text-center text-dark text-sm">{{$maquinariasP->year}}</td>
                        <td class="text-left text-dark text-sm" colspan="3">{{$maquinariasP->description}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <hr>

    <section class="pt-3">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm">
                <thead>
                    <tr>
                        <th class="text-center text-dark">FECHA SALIDA</th>
                        <th class="text-center text-dark">FECHA ENTREGA</th>
                        <th class="text-center text-dark">HORA SALIDA</th>
                        <th class="text-center text-dark">HORA ENTREGA</th>
                    </tr>
                </thead>
                <tbody style="background-color: #ffffff">
                    <tr>
                        <td class="text-center text-dark">{{\Carbon\Carbon::parse($maquinariasP->fecha_salida)->format('d/m/Y')}}</td>
                        <td class="text-center text-dark">{{\Carbon\Carbon::parse($maquinariasP->fecha_entrega)->format('d/m/Y')}}</td>
                        <td class="text-center text-dark">{{\Carbon\Carbon::parse($maquinariasP->hora_salida)->format('H:i:s A')}}</td>
                        <td class="text-center text-dark">{{\Carbon\Carbon::parse($maquinariasP->hora_entrega)->format('H:i:s A')}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <hr>

    <section class="pt-3">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm">
                <thead>
                    <tr>
                        <th class="text-center text-dark">COSTO</th>
                        <th class="text-center text-dark">IVA(0.13%)</th>
                        <th class="text-center text-dark">SUBTOTAL</th>
                    </tr>
                </thead>
                <tbody style="background-color: #ffffff">
                    <tr>
                        <td class="text-center text-dark">${{number_format($maquinariasP->price, 2)}}</td>
                        <td class="text-center text-dark">${{number_format($maquinariasP->iva, 2)}}</td>
                        <td class="text-center text-dark">${{number_format($maquinariasP->price, 2)}}</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td>Total a pagar: ${{ number_format($maquinariasP->total, 2) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</body>

</html>