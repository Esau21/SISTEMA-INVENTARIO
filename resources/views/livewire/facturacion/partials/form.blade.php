@include('commom.modalHead')

<div class="card">
    <div class="card-header bg-secondary">
        <h6 class="text-uppercase text-white text-center">
            <span>Crear Nueva factura</span>
        </h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="" class="badge badge-secondary text-white">Monto:</label>
                    <input type="number" wire:model.lazy="monto" wire:change="calculateAverage" class="form-control"
                        placeholder="Ingresa el monto por favor...">
                    @error('monto')
                        <span class="text-danger text-center">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="badge badge-secondary text-white">Saldo:</label>
                    <input type="number" wire:model.lazy="saldo" wire:change="calculateAverage" class="form-control"
                        placeholder="Ingresa el saldo por favor...">
                    @error('saldo')
                        <span class="text-danger text-center">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="badge badge-secondary text-white">Selecciona el estado:</label>
                    <select wire:model.lazy="estado" class="form-control">
                        <option value="Elegir">Elegir</option>
                        <option value="CANCEL">CANCEL</option>
                        <option value="PEDING">PEDING</option>
                        <option value="PARTIAL">PARTIAL</option>
                    </select>
                    @error('estado')
                        <span class="text-danger text-center">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="badge badge-secondary text-white">Selecciona el tipo docuemnto:</label>
                    <select wire:model.lazy="tipo_documento" class="form-control">
                        <option value="Elegir">Elegir</option>
                        <option value="FACTURA">FACTURA</option>
                        <option value="CREDITO_FISCAL">CREDITO_FISCAL</option>
                    </select>
                    @error('tipo_documento')
                        <span class="text-danger text-center">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="badge badge-secondary text-white">Selecciona el producto:</label>
                    <select wire:model.lazy="id_producto" class="form-control">
                        <option value="Elegir">Elegir</option>
                        @foreach ($p as $a)
                            <option value="{{ $a['id'] }}">{{ $a->name }}</option>
                        @endforeach
                    </select>
                    @error('id_producto')
                        <span class="text-danger text-center">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="badge badge-secondary text-white">Selecciona al cliente:</label>
                    <select wire:model.lazy="id_cliente" class="form-control">
                        <option value="Elegir">Elegir</option>
                        @foreach ($c as $a)
                            <option value="{{ $a['id'] }}">{{ $a->name }}</option>
                        @endforeach
                    </select>
                    @error('id_cliente')
                        <span class="text-danger text-center">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="" class="badge badge-secondary text-white">Iva:</label>
                    <input type="number" disabled wire:model.lazy="iva" wire:change="calculateAverage"
                        class="form-control" placeholder="Ingresa el monto por favor...">
                    @error('monto')
                        <span class="text-danger text-center">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="" class="badge badge-secondary text-white">Fecha Emision:</label>
                    <input type="date" wire:model.lazy="fecha_emision" class="form-control"
                        placeholder="Ingresa el monto por favor...">
                    @error('fecha_emision')
                        <span class="text-danger text-center">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="" class="badge badge-secondary text-white">Fecha Vencimiento:</label>
                    <input type="date" wire:model.lazy="fecha_vencimiento" class="form-control"
                        placeholder="Ingresa el monto por favor...">
                    @error('fecha_vencimiento')
                        <span class="text-danger text-center">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="" class="badge badge-secondary text-white">Notas:</label>
                    <input type="text" wire:model.lazy="notas" class="form-control"
                        placeholder="Ingresa las notas del producto por favor...">
                    @error('notas')
                        <span class="text-danger text-center">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="" class="badge badge-secondary text-white">Descuento:</label>
                    <input type="number" wire:model="descuento" class="form-control"
                        placeholder="Ingresa el descuento porfavor">
                    @error('descuento')
                        <span class="text-danger text-center">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="" class="badge badge-secondary text-white">Sub Total:</label>
                    <input type="number" wire:model.lazy="subtotal" wire:change="WireChangeTotal()"
                        class="form-control" placeholder="Ingresa el descuento por favor...">
                    @error('subtotal')
                        <span class="text-danger text-center">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="" class="badge badge-secondary text-white">Total:</label>
                    <input type="number" wire:model.lazy="total_pagado" class="form-control"
                        placeholder="Ingresa el descuento por favor...">
                    @error('total_pagado')
                        <span class="text-danger text-center">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>


@include('commom.modalFooter')
