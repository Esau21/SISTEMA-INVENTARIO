<div>
    <div class="row sales layout-top-spacing">
        <div class="col-sm-12">
            <div class="widget widget-chart-one">
                <div class="widget-heading">
                    <h4 class="card-title">
                        <b>{{ $componentName }} | {{ $pageTitle }}</b>
                    </h4>
                    <ul class="tabs tab-pills">

                        <li>
                            <a href="javascript:void(0)" class="tabmenu btn bg-dark" data-toggle="modal"
                                data-target="#theModal"><i class="fas fa-plus-circle"></i> Agregar</a>
                        </li>

                    </ul>
                </div>

                @include('commom.searchbox')


                <div class="widget-content">
                    <div class="table-responsive">
                        <table class="table table-bordered table striped mt-1">
                            <thead class="text-white" style="background: #3B3F5C">
                                <tr>
                                    <th class="table-th text-white">ID</th>
                                    <th class="table-th text-white">NOMBRE</th>
                                    <th class="table-th text-center text-white">DESCRIPCION</th>
                                    <th class="table-th text-center text-white">STATUS</th>
                                    <th class="table-th text-center text-white">FECHA SALIDA</th>
                                    <th class="table-th text-center text-white">FECHA ENTREGA</th>
                                    <th class="table-th text-center text-white">HORA SALIDA</th>
                                    <th class="table-th text-center text-white">HORA ENTREGA</th>
                                    <th class="table-th text-center text-white">PRECIO</th>
                                    <th class="table-th text-center text-white">IVA(0.13%)</th>
                                    <th class="table-th text-center text-white">TOTAL</th>
                                    <th class="table-th text-center text-white">AÑO</th>
                                    <th class="table-th text-center text-white">MODELO</th>
                                    <th class="table-th text-center text-white">IMAGEN</th>
                                    <th class="table-th text-center text-white">PROCESOS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($maquinarias as $key => $m)
                                <tr>
                                    <td class="text-center text-dark text-uppercase">{{$m->id}}</td>
                                    <td class="text-center text-dark text-uppercase">{{$m->name}}</td>
                                    <td class="text-center text-dark text-uppercase">{{$m->description}}</td>
                                    <td class="text-center text-dark text-uppercase">
                                        <span
                                            class="badge badge-success {{$m->status == 'DISPONIBLE' ? 'badge-success' : ($m->status == 'PRESTADO' ? 'badge-secondary' : ($m->status == 'EN-ESPERA' ? 'badge-warning' : ($m->status == 'RETARDADO' ? 'badge-danger' : ($m->status == 'ENTREGADO' ? 'badge-primary' : ''))))}}">
                                            {{ $m->status }}
                                        </span>
                                    </td>
                                    <td class="text-center text-dark text-uppercase">
                                        <span class="badge badge-dark">
                                            {{\Carbon\Carbon::parse($m->fecha_salida)->format('d/m/Y')}}
                                        </span>
                                    </td>
                                    <td class="text-center text-dark text-uppercase">
                                        <span class="badge badge-warning">
                                            {{\Carbon\Carbon::parse($m->fecha_entrega)->format('d/m/Y')}}
                                        </span>
                                    </td>
                                    <td class="text-center text-dark text-uppercase">
                                        <span class="badge badge-dark">
                                            {{\Carbon\Carbon::parse($m->hora_salida)->format('H:i:s')}}
                                        </span>
                                    </td>
                                    <td class="text-center text-dark text-uppercase">
                                        <span class="badge badge-warning">
                                            {{\Carbon\Carbon::parse($m->hora_entrega)->format('H:i:s')}}
                                        </span>
                                    </td>
                                    <td class="text-center text-dark text-uppercase">
                                        ${{number_format($m->price, 2)}}
                                    </td>
                                    <td class="text-center text-dark text-uppercase">
                                        ${{number_format($m->iva, 2)}}
                                    </td>
                                    <td class="text-center text-dark text-uppercase">
                                        ${{number_format($m->total, 2)}}
                                    </td>
                                    <td class="text-center text-dark text-uppercase">
                                        <span class="badge badge-secondary text-white">
                                            {{$m->year}}
                                        </span>
                                    </td>
                                    <td class="text-center text-dark text-uppercase">
                                        <span class="badge badge-secondary text-white">
                                            {{$m->model}}
                                        </span>
                                    </td>
                                    <td class="text-center text-dark text-uppercase">
                                        <span class="badge badge-white text-white">
                                            <img src="{{ asset('storage/maquinarias/' . $m->image) }}" width="70px;" class="img-fluid"
                                                alt="ejemplo">
                                        </span>
                                    </td>
                                    <td class="text-center d-grid">
                                        <a href="javascript:void(0)" class="btn btn-sm btn-outline-primary"
                                            wire:click='Edit({{$m->id}})'>
                                            <i class="fas fa-edit" style="color: #3b3f5c"></i>
                                        </a>
                                        <a href="javascript:void(0)"
                                        onclick="window.location='{{ route('maquinaria', $m->id) }}'"
                                        class="btn btn-dark mtmobile d-grid mb-2" title="Generar PDF">
                                        <i class="fas fa-file-pdf" style="color: red;"></i>

                                        <a href="javascript:void(0)" onclick="Confirm('{{ $m->id }}')"
                                            class="btn btn-danger" title="Delete"><i class="fas fa-trash"></i></a>
                                    </a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $maquinarias->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.maquinarias.form')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.livewire.on('show-modal', msg => {
            $('#theModal').modal('show')
        });
        window.livewire.on('maqui-add', msg => {
            $('#theModal').modal('hide');
            noty(Msg);
        });

        window.livewire.on('update-machinaries', Msg => {
            noty(Msg);
        });
        window.livewire.on('maqui-deleted', Msg => {
            noty(Msg);
        });
    });

    function Confirm(id) {

        swal({
            title: 'CONFIRMAR',
            text: '¿CONFIRMA ELIMINAR EL REGISTRO?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonColor: '#3B3F5C',
            confirmButtonText: 'Aceptar'
        }).then(function (result) {
            if (result.value) {
                window.livewire.emit('deleteRow', id)
                swal.close()
            }
        })
    }

</script>