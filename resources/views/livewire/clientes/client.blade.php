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
                                <th class="table-th text-center text-white">NOMBRE</th>
                                <th class="table-th text-center text-white">DIRECCION</th>
                                <th class="table-th text-center text-white">NIT</th>
                                <th class="table-th text-center text-white">NRC</th>
                                <th class="table-th text-center text-white">GIRO</th>
                                <th class="table-th text-center text-white">TELEFONO</th>
                                <th class="table-th text-center text-white">OPCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $c)
                                <tr>
                                    <td class="text-center">
                                        <h6>{{ $c->id }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6>{{ $c->name }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6>{{ $c->direccion }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6>{{ $c->nit }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6>{{ $c->nrc }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6>{{ $c->giro }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6>{{ $c->telefono }}</h6>
                                    </td>
                                    <td class="text-center">

                                        <a href="javascript:void(0)" wire:click="Edit({{ $c->id }})"
                                            class="btn btn-dark mtmobile" title="Edit"><i class="fas fa-edit"></i></a>


{{-- 
                                        <a href="javascript:void(0)"
                                            onclick="Confirm('{{ $c->id }}', '{{ $c->sales->count() }}')"
                                            class="btn btn-danger" title="Delete"><i class="fas fa-trash-alt">E</i></a>
 --}}


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $clientes->links() }}
                </div>
            </div>
        </div>
    </div>
    @include('livewire.clientes.form')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        window.livewire.on('show-modal', msg => {
            $('#theModal').modal('show')
        });

        window.livewire.on('cliente-added', Msg => {
            noty(Msg)
        });

        window.livewire.on('cliente-updated', msg => {
            $('#theModal').modal('hide')
        });

        window.livewire.on('cliente-delete', Msg => {
            noty(Msg)
        });

    });



    function Confirm(id, sales) {
        if (sales > 0) {
            swal('No se puede eliminar el cliente ya que posee una venta')
            return;
        }

        swal({
            title: 'CONFIRMAR',
            text: '¿CONFIRMA ELIMINAR EL REGISTRO?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonColor: '#3B3F5C',
            confirmButtonText: 'Aceptar'
        }).then(function(result) {
            if (result.value) {
                window.livewire.emit('deleteRow', id)
                swal.close()
            }
        })
    }
</script>
