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
                        <thead class="text-white text-center" style="background: #3B3F5C">
                            <tr>
                                <th class="table-th text-white text-left">NOMBRE</th>
                                <th class="table-th text-white text-left">DESCRIPCION</th>
                                <th class="table-th text-white text-left">¿SERVICIO PROFESIONA?</th>
                                <th class="table-th text-white text-left">SERVICIO</th>
                                <th class="table-th text-white text-center">BARCODE</th>
                                <th class="table-th text-white text-center">CATEGORIA</th>
                                <th class="table-th text-white text-center">PRECIO</th>
                                <th class="table-th text-white text-center">STOCK</th>
                                <th class="table-th text-white text-center">INV.MIN</th>
                                <th class="table-th text-white text-center">IMAGEN</th>
                                <th class="table-th text-white text-center">PROCESOS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $product)
                            <tr>
                                <td>
                                    <h6 class="text-left">{{ $product->name }}</h6>
                                </td>
                                <td>
                                    <h6 class="text-left">{{ $product->descripcion }}</h6>
                                </td>
                                <td>
                                    <h6 class="text-left">
                                        <span class="badge bg-success {{ $product->servico_obra === 'SI' ? 'bg-success' : 'bg-danger' }}">
                                            {{ $product->servico_obra }}
                                        </span>
                                    </h6>
                                </td>
                                <td>
                                    <h6 class="text-left">{{ $product->servicio }}</h6>
                                </td>
                                <td>
                                    <h6 class="text-center">{{ $product->barcode }}</h6>
                                </td>
                                <td>
                                    <h6 class="text-center">{{ $product->category }}</h6>
                                </td>
                                <td>
                                    <h6 class="text-center">${{ $product->price }}</h6>
                                </td>
                                <td>
                                    <h6 class="text-center">{{ $product->stock }}</h6>
                                </td>
                                <td>
                                    <h6 class="text-center">{{ $product->alerts }}</h6>
                                </td>
                                <td class="text-center">
                                    <span>
                                        <img src="{{ asset('storage/products/' . $product->imagen) }}"
                                            alt="imagen de ejemplo" height="70" width="80" class="rounded">
                                    </span>
                                </td>
                                <td class="text-center">

                                    <a href="javascript:void(0)" wire:click.prevent="Edit({{ $product->id }})"
                                        class="btn btn-dark mtmobile" title="Edit"><i class="fas fa-edit"></i></a>

                                        <a href="javascript:void(0)" onclick="Confirm('{{ $product->id }}', '{{ $product->sales ? $product->sales->count() : 0 }}', '{{ $product->saleDetails ? $product->saleDetails->count() : 0 }}')"
                                            class="btn btn-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                         </a>                                         
                                                                                
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
    @include('livewire.products.form')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        window.livewire.on('show-modal', msg => {
            $('#theModal').modal('show')
        });
        window.livewire.on('product-added', msg => {
            $('#theModal').modal('hide')
        });
        window.livewire.on('product-updated', msg => {
            $('#theModal').modal('hide')
        });
        window.livewire.on('modal-hide', msg => {
            $('#theModal').modal('hide')
        });
        window.livewire.on('hidden.bs.modal-hide', msg => {
            $('.er').css('display', 'none')
        });
    });

    function Confirm(id, sales, saleDetails) {
    if (sales > 0 || saleDetails > 0) {
        swal('No se puede eliminar el producto porque tiene ventas o detalles de ventas asociados');
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
            window.livewire.emit('deleteRow', id);
            swal.close();
        }
    });
}

</script>