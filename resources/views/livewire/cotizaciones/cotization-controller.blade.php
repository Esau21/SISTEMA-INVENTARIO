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
                                    <th class="table-th text-center text-white">FECHA_COTIZACION</th>
                                    <th class="table-th text-center text-white">OBSERVACIONES</th>
                                    <th class="table-th text-center text-white">CLIENTE</th>
                                    <th class="table-th text-center text-white">USUARIO</th>
                                    <th class="table-th text-center text-white">MANO OBRA</th>
                                    <th class="table-th text-center text-white">PRECIO</th>
                                    <th class="table-th text-center text-white">TOTAL MANO_OBRA</th>
                                    <th class="table-th text-center text-white">IVA(0.13%)</th>
                                    <th class="table-th text-center text-white">TOTAL</th>
                                    <th class="table-th text-center text-white">PROCESOS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cotizaciones as $key => $coti)
                                <tr>
                                    <td class="table-th text-dark">{{ $coti->id }}</td>
                                    <td class="table-th text-dark">{{ $coti->nombrepro }}</td>
                                    <td class="table-th text-dark text-center">{{
                                        \Carbon\Carbon::parse($coti->fechacotizacion)->format('d/m/Y') }}</td>
                                    <td class="table-th text-dark text-center">{{ $coti->observaciones }}</td>
                                    <td class="table-th text-dark text-center">{{ $coti->clientename }}</td>
                                    <td class="table-th text-dark text-center">{{ $coti->usuarioname }}</td>
                                    <td class="table-th text-dark text-center">{{ $coti->manoobra }}</td>
                                    <td class="table-th text-dark text-center">${{ number_format($coti['price'], 2) }}
                                    </td>
                                    <td class="table-th text-dark text-center">${{
                                        number_format($coti['total_manoobra'],2) }}</td>
                                    <td class="table-th text-dark text-center">
                                        <span class="badge badge-primary text-white">
                                            ${{ number_format($coti['iva'], 2) }}
                                        </span>
                                    </td>
                                    <td class="table-th text-dark text-center">
                                        <span class="badge badge-success text-dark">
                                            ${{ number_format($coti['total'], 2) }}
                                        </span>
                                    </td>
                                    <td class="table-th text-dark text-center">
                                        <a href="javascript:void(0)" wire:click="Edit({{ $coti->id }})"
                                            class="btn btn-dark mtmobile d-grid mb-2" title="Edit"><i
                                                class="fas fa-edit"></i></a>

                                        <a href="javascript:void(0)"
                                            onclick="window.location='{{ route('coti', $coti->id) }}'"
                                            class="btn btn-dark mtmobile d-grid mb-2" title="Generar PDF">
                                            <i class="fas fa-file-pdf" style="color: red;"></i>
                                        </a>

                                        <a href="javascript:void(0)" onclick="Confirm('{{ $coti->id }}')"
                                            class="btn btn-danger" title="Delete"><i class="fas fa-trash"></i></a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $cotizaciones->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.cotizaciones.form')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.livewire.on('show-modal', msg => {
            $('#theModal').modal('show')
        });
        window.livewire.on('add-manoobra', msg => {
            $('#theModal').modal('hide');
            noty(Msg);
        });

        window.livewire.on('update-coti', msg => {
            $('#theModal').modal('hide');
            noty(Msg);
        });
        window.livewire.on('coti-deleted', Msg => {
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