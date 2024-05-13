<div wire:ignore.self class="modal fade" id="modalDetails" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-success">
                    <b>Detalle de la maquinaria # {{$maquisaleId}}</b>
                </h5>
                <h6 class="text-center text-warning" wire:loading>
                    PORFAVOR ESPERE
                </h6>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mt-1">
                        <thead class="text-white" style="background: #3B3F5C">
                            <tr>
                                <th class="table-th text-white text-center">FOLIO</th>
                                <th class="table-th text-center text-white">TOTAL</th>
                                <th class="table-th text-center text-white">NOMBRE</th>
                                <th class="table-th text-center text-white">STATUS</th>
                                <th class="table-th text-center text-white">CLIENTE</th>
                                <th class="table-th text-center text-white">FECHA</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($details as $d)
                                <tr>
                                    <td class="text-center text-dark">{{$d->id}}</td>
                                    <td class="text-center"><h6>${{number_format($d->total,2)}}</h6></td>
                                    <td class="text-center text-dark">{{$d->name}}</td>
                                    <td class="text-center text-dark text-uppercase">
                                        <span
                                            class="badge badge-success {{$d->status == 'DISPONIBLE' ? 'badge-success' : ($d->status == 'PRESTADO' ? 'badge-secondary' : ($d->status == 'EN-ESPERA' ? 'badge-warning' : ($d->status == 'RETARDADO' ? 'badge-danger' : ($d->status == 'ENTREGADO' ? 'badge-primary' : ''))))}}">
                                            {{ $d->status }}
                                        </span>
                                    </td>
                                    <td class="text-center text-dark">{{$d->namecliente}}</td>
                                    <td class="text-center text-dark">{{\Carbon\Carbon::parse($d->created_at)->format('Y:m:d')}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                       
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger close-btn text-danger" data-dismiss="modal"><i
                        class="fas fa-ban"></i> CERRAR</button>
            </div>
        </div>
    </div>
</div>