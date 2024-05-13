<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>Administrar Stock de producto</b>
                </h4>
            </div>
            
            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered table striped mt-1">
                        <thead class="text-white text-center" style="background: #3B3F5C">
                            <tr>
                                <th class="table-th text-white text-left">Producto</th>
                                <th class="table-th text-white text-center">Stock</th>
                                <th class="table-th text-white text-center">Minimos</th>
                                <th class="table-th text-white text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $product)
                                <tr>
                                    <td>
                                        <h6 class="text-left">{{ $product->name }}</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-center">{{ $product->stock }}</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-center">{{ $product->alerts }}</h6>
                                    </td>
                                    <td class="text-center">

                                        <a href="javascript:void(0)" wire:click="Edit({{ $product->id }})"
                                            class="btn btn-dark mtmobile" data-toggle="tooltip" data-placement="bottom" title="Actualizar Stock de producto" ><i class="fas fa-edit"></i></a>

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
    @include('livewire.stock.updateStock')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        window.livewire.on('show-modal', msg => {
            $('#stockUpdate').modal('show')
        });
        window.livewire.on('stock-update', msg => {
            $('#stockUpdate').modal('hide')
            swal({
                title: 'Producto',
                text: 'Stock actualizado',
                type: 'warning',
                confirmButtonColor: '#3B3F5C',
                confirmButtonText: 'Aceptar'
            })
        });
        
    });
</script>