<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{$componentName}} | {{$pageTitle}}</b>
                </h4>
                <ul class="tabs tab-pills">
                    <li>
                        <a href="javascript:void(0)" class="tabmenu bg-dark" data-toggle="modal" data-target="#theModal">Agregar</a>
                    </li>
                </ul>
            </div>
            @include('commom.searchbox')



            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered table striped mt-1">
                        <thead class="text-white text-center" style="background: #3B3F5C">
                            <tr>
                                <th class="table-th text-white text-left">USUARIO</th>
                                <th class="table-th text-white text-center">TELEFONO</th>
                                <th class="table-th text-white text-center">EMAIL</th>
                                <th class="table-th text-white text-center">ESTADO</th>
                                <th class="table-th text-white text-center">PERFIL</th>
                                <th class="table-th text-white text-center">IMAGEN</th>
                                <th class="table-th text-white text-center">PROCESOS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $r)
                            <tr>
                                <td><h6>{{$r->name}}</h6></td>
                                <td class="text-center"><h6>{{$r->phone}}</h6></td>
                                <td class="text-center"><h6>{{$r->email}}</h6></td>
                                <td class="text-center">
                                    <span class="badge {{ $r->status == 'Active' ? 'badge-success' : 'badge-danger' }} text-uppercase">
                                        {{$r->status}}
                                    </span>
                                </td>
                                <td class="text-center text-uppercase"><h6>{{$r->profile}}</h6></td>
                                <td class="text-center">
                                    @if($r->image !=null)
                                    <img src="{{ asset('storage/users/' . $r->image ) }}" alt="imagen"  height="70" width="80" class="rounded" class="card-img-top img-fluid">
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)"
                                    wire:click="edit({{$r->id}})"
                                    class="btn btn-dark mtmobile" title="Edit"><i class="fas fa-edit"></i></a>

                                    <a href="javascript:void(0)"
                                    onclick="Confirm('{{$r->id}}')"
                                    class="btn btn-danger" title="Delete"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$data->links()}}
                </div>
            </div>
        </div>
    </div>
    @include('livewire.users.form')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        window.livewire.on('user-add', Msg =>{
            $('#theModal').modal('hide')
            noty(Msg)
        });
        window.livewire.on('user-update', Msg =>{
            $('#theModal').modal('hide')
            noty(Msg)
        });
        window.livewire.on('user-delete', Msg =>{
            noty(Msg)
        });
        window.livewire.on('hide-modal', Msg =>{
            $('#theModal').modal('hide')
        });
        window.livewire.on('show-modal', Msg =>{
            $('#theModal').modal('show')
        });
        window.livewire.on('user-withsales', Msg =>{
            noty(Msg)
        });
    });

    function Confirm(id)
    {
        swal({
            title: 'CONFIRMAR',
            text: '¿CONFIRMA ELIMINAR EL REGISTRO?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonColor: '#3B3F5C',
            confirmButtonText: 'Aceptar'
        }).then(function(result){
            if(result.value){
                window.livewire.emit('deleteRow', id)
                swal.close()
            }
        })
    }
</script>