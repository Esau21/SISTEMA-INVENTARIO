<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{$componentName}} | {{$pageTitle}}</b>
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
                                <th class="table-th text-white">DESCRIPCION</th>
                                <th class="table-th text-center text-white">IMAGEN</th>
                                <th class="table-th text-center text-white">PROCESOS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>
                                    <h6>{{$category->name}}</h6>
                                </td>
                                <td class="text-center">
                                    <span>
                                        <img src="{{ asset('storage/categories/' . $category->imagen) }}"
                                            alt="imagen de ejemplo" height="70" width="80" class="rounded">
                                    </span>
                                </td>
                                <td class="text-center">
                                   
                                    <a href="javascript:void(0)" wire:click="Edit({{$category->id}})"
                                        class="btn btn-dark mtmobile" title="Edit"><i class="fas fa-edit"></i></a>
                                    

                                       
                                    <a href="javascript:void(0)"
                                        onclick="Confirm('{{$category->id}}', '{{$category->products->count()}}')"
                                        class="btn btn-danger" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                        


                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$categories->links()}}
                </div>
            </div>
        </div>
    </div>
    @include('livewire.category.form')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        window.livewire.on('show-modal', msg => {
            $('#theModal').modal('show')
        });

        window.livewire.on('category-added', msg => {
            $('#theModal').modal('hide')
        });

        window.livewire.on('category-updated', msg => {
            $('#theModal').modal('hide')
        });


    });



    function Confirm(id, products) {
        if (products > 0) {
            swal('No se puede eliminar la categoria por que esta tiene una relacion con un producto')
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
        }).then(function (result) {
            if (result.value) {
                window.livewire.emit('deleteRow', id)
                swal.close()
            }
        })
    }

</script>
