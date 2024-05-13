@include('commom.modalHead')

<div class="container-fluid">
    <div class="row">
        <div class="card col-sm-12">
            <div class="card-header">
                <h6 class="text-center text-uppercase text-dark">Agregar nueva cotizacion</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="col-sm-12 mb-3">
                        <input type="text" wire:model.lazy='nombrepro' class="form-control"
                            placeholder="Ingresa el nombre del producto">
                    </div>
                    <div class="col-sm-12 mb-3">
                        <input type="file" wire:model.lazy='image' class="form-control" placeholder="Sube una imagen">
                    </div>
                    <div class="col-sm-12 mb-3">
                        <input type="date" wire:model.lazy='fechacotizacion' class="form-control">
                    </div>
                    <div class="col-sm-12 mb-3">
                        <textarea name="observaciones" wire:model.lazy='observaciones' class="form-control" cols="30"
                            rows="10"></textarea>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label>¿Mano de obra?</label>
                        <select class="form-control" name="manoobra" wire:model.lazy='manoobra' id="manoobra">
                            <option value="">ELEGIR</option>
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label>Precio del producto</label>
                        <input type="number" wire:model.lazy='price' class="form-control"
                            placeholder="Ingresa el precio del producto">
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label>Total mano obra</label>
                        <input type="number" wire:model.lazy='total_manoobra' class="form-control"
                            placeholder="Total mano de obra">
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label>Iva(0.13%)</label>
                        <input disabled type="number" wire:model.lazy='iva' class="form-control" placeholder="Iva">
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label>Total</label>
                        <input type="number" wire:model.lazy='total' class="form-control" placeholder="Total">
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label>Elige un cliente</label>
                        <select name="clienteId" class="form-control" id="clienteId" wire:model.lazy='clienteId'>
                            <option value="ELEGIR">ELEGIR</option>
                            @foreach ($clientes as $c)
                            <option value="{{ $c['id'] }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label>Elige un vendedor</label>
                        <select class="form-control" name="usuarioId" id="usuarioId" wire:model.lazy='usuarioId'>
                            <option value="ELEGIR">ELEGIR</option>
                            @foreach ($usuarios as $u)
                            <option value="{{ $u['id'] }}">{{ $u->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('commom.modalFooter')