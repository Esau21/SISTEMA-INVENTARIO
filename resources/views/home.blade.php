@extends('layouts.theme.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6 mt-5 text-center">
            <b>
                <h5 class="display-4 text-dark">Bienvenidos al sistema SOLUMAQ S.A DE C.V</h5>
            </b>
            <b>
                <p class="lead text-dark">Bienvendios al sistema de control de ventas e inventario puedes ver las utimas
                    actualizaciones del sistema.</p>
            </b>
        </div>
        <div class="col-12 col-lg-6 mt-5 d-flex justify-content-center align-items-center">
            <img class="img-fluid mb-4" height="400px;" width="400px;" src="{{ asset('img/ol.png') }}"
                alt="Desarrollo">
        </div>
    </div>
</div>
@endsection