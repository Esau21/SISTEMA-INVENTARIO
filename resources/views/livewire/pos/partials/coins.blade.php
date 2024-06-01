<div class="row mt-3">
    <div class="col-sm-12">
        <div class="connect-sorting">
            <h5 class="text-center mb-2">DENOMINACIONES</h5>
            <div class="container">
                <div class="row">
                    @foreach ($denominations as $d)
                    <div class="col-sm mt-2">
                        {{-- <button wire:click.prevent="ACash({{ $d->value }})" class="btn btn-dark btn-block den">
                            {{ $d->value > 0 ? '$' . number_format($d->value, 2, '.', '') : 'Calcular sin Iva' }}

                        </button> --}}
                        <button wire:click.prevent="Iva({{ $d->value }})" class="btn btn-dark btn-block den">
                            {{ $d->value > 0 ? '$' . number_format($d->value, 2, '.', '') : 'Calcular con Iva' }}
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="connect-sorting-content mt-4">
                <div class="card simple-title-task ui-sortable-handle">
                    <div class="card-body">
                        <div class="col-sm-12 col-md-12 mb-3">
                            <label for="">Cliente</label>
                            <select wire:model.lazy="cliente_id" class="form-control">
                                <option value="">Selecc...</option>
                                @foreach ($clientes as $cliente)
                                <option value="{{$cliente->id}}">{{$cliente->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-12 mb-3">
                            <div class="form-row">
                                <div class="col-sm-12 col-md-6">
                                    <label class="text-center" for="">CCF</label>
                                    <input type="radio" style="height:1.8rem" class="form-control"
                                        wire:model="tipo_docs" value="ccf">
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label class="text-center" for="">Factura</label>
                                    <input type="radio" style="height:1.8rem" class="form-control"
                                        wire:model="tipo_docs" value="factura">
                                </div>
                            </div>
                        </div>
                        <div class="input-group input-group-md mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text input-gp hideonsm"
                                    style="background: #3B3F5C; color:white">
                                    EFECTIVO F8
                                </span>
                            </div>
                            <input type="number" id="cash" wire:model="efectivo" wire:keydown.enter="saveSale"
                                class="form-control text-center" value="{{ $efectivo }}">
                            <div class="input-group-append">
                                <span wire:click="$set('efectivo', 0)" class="input-group-text"
                                    style="background: #3B3F5C; color:white">
                                    <i class="fas fa-backspace fa-2x"></i>
                                </span>
                            </div>
                        </div>
                        <h4 class="text-muted">Cambio: ${{ number_format(round($change, 2), 2) }}</h4>
                        <div class="row justify-content-between mt-5">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                @if ($total > 0)
                                <button onclick="Confirm('','clearCart','¿SEGURO DE ELIMINAR EL CARRITO?')"
                                    class="btn btn-dark mtmobile">
                                    CANCELAR F4
                                </button>
                                @endif
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                @if ($efectivo >= $total && $total > 0)
                                <button wire:click.prevent="saveSale" class="btn btn-dark btn-md btn-block">
                                    GUARDAR F9
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>