<div class="connect-sorting">
    <h6>{{ $pageTitle }} | {{ $componentName }}</h6>
    <div class="connect-sorting-content">
        <div class="card simple-title-task ui-sortable-handle">
            <div class="card-body">

                <a class="btn tabmenu btn-lg btn-inblock btn-dark mtmobile" href="javascript:void(0)" data-toggle="modal"
                    data-target="#theModal">
                    <i class="fas fa-file-invoice-dollar"></i>
                    agregar factura nueva
                </a>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped mt-1">
                        <thead class="text-white" style="background: #3B3F5C">
                            <tr>
                                <th class="table-th text-left text-white">ID</th>
                                <th class="table-th text-left text-white">MONTO</th>
                                <th class="table-th text-center text-white">SALDO</th>
                                <th width="13%" class="table-th text-center text-white">ESTADO</th>
                                <th class="table-th text-center text-white">TIPO DOCUMENTO</th>
                                <th class="table-th text-center text-white">PRODUCTO</th>
                                <th class="table-th text-center text-white">CLIENTE</th>
                                <th class="table-th text-center text-white">IVA</th>
                                <th class="table-th text-center text-white">FECHA EMISON</th>
                                <th class="table-th text-center text-white">FECHA VENCIMIENTO</th>
                                <th class="table-th text-center text-white">NOTAS</th>
                                <th class="table-th text-center text-white">DESCUENTOS</th>
                                <th class="table-th text-center text-white">SUBTOTAL</th>
                                <th class="table-th text-center text-white">TOTAL A PAGAR</th>
                                <th class="table-th text-center text-white">PROCESOS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($facturacions->sortBy('id') as $key => $f)
                                <tr>
                                    <td class="text-center">
                                        <h6>{{ $f->id }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6>{{ $f->monto }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6>{{ $f->saldo }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6 class="text-upppercase">
                                            <span
                                                class="badge {{ $f->estado == 'CANCEL' ? 'badge-danger' : ($f->estado == 'PEDING' ? 'badge-warning' : 'badge-success') }}">
                                                {{ $f->estado }}
                                            </span>
                                        </h6>
                                    </td>
                                    <td class="text-center">
                                        <h6 class="text-uppercase">
                                            <span>{{ $f->tipo_documento }}</span>
                                        </h6>
                                    </td>
                                    <td class="text-center">
                                        <h6 class="text-uppercase">
                                            <span>{{ $f->nameproduct }}</span>
                                        </h6>
                                    </td>
                                    <td class="text-center">
                                        <h6 class="text-uppercase">
                                            <span>{{ $f->clientename }}</span>
                                        </h6>
                                    </td>
                                    <td class="text-center">
                                        <h6 class="text-uppercase">
                                            <span>{{ $f->iva }}</span>
                                        </h6>
                                    </td>
                                    <td class="text-center">
                                        <h6 class="text-uppercase">
                                            <span>{{ $f->fecha_emision }}</span>
                                        </h6>
                                    </td>
                                    <td class="text-center">
                                        <h6 class="text-uppercase">
                                            <span>{{ $f->fecha_vencimiento }}</span>
                                        </h6>
                                    </td>
                                    <td class="text-center">
                                        <h6 class="text-uppercase">
                                            <span>{{ $f->notas }}</span>
                                        </h6>
                                    </td>
                                    <td class="text-center">
                                        <h6 class="text-uppercase">
                                            <span>{{ $f->descuento }}</span>
                                        </h6>
                                    </td>
                                    <td class="text-center">
                                        <h6 class="text-uppercase">
                                            <span>{{ $f->subtotal }}</span>
                                        </h6>
                                    </td>
                                    <td class="text-center">
                                        <h6 class="text-uppercase">
                                            <span>{{ $f->total_pagado }}</span>
                                        </h6>
                                    </td>
                                    <td class="text-center">
                                        <h6 class="text-uppercase">
                                            <a href="javascript:void(0)" wire:click="Edit({{ $f->id }})"
                                                class="btn btn-outline-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </h6>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $facturacions->links() }}
            </div>
        </div>
    </div>
</div>

@include('livewire.facturacion.partials.form')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.livewire.on('show-modal', msg => {
            $('#theModal').modal('show');
        });

        window.livewire.on('facturacion-added', Msg => {
            noty(Msg).modal('hide');
        });
    });
</script>
