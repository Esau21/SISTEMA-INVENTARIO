@include('commom.modalHead')

<div class="container-fluid">
    <div class="card col-sm-12">
        <div class="card-header">
            <h6 class="text-center text-uppercase text-dark">Agregar nueva cotizacion</h6>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="col-sm-12 mb-3">
                    <select id="nombrepro" name="nombrepro" wire:model.lazy='nombrepro' class="form-control">
                        <option value="Elegir">Elegir</option>
                        <option value="Llantas minibobcat 10 lonas">Llantas minibobcat 10 lonas</option>
                        <option value="Llantas minibobcat 12 lonas">Llantas minibobcat 12 lonas</option>
                        <option value="Llanta para tractor R1/R1W">Llanta para tractor R1/R1W</option>
                        <option value="llanta industrial (R4)">llanta industrial (R4)</option>
                    </select>

                </div>
                <div class="col-sm-12 mb-3">
                    <input type="date" wire:model.lazy='fechacotizacion' class="form-control">
                </div>
                <div class="col-sm-12 mb-3">
                    <textarea name="observaciones" wire:model.lazy='observaciones' class="form-control" cols="30"
                        rows="10"></textarea>
                </div>
                <div class="col-sm-6 mb-3">
                    <label>¿Servicios profesionales?</label>
                    <select class="form-control" name="manoobra" wire:model.lazy='manoobra' id="manoobra">
                        <option value="">ELEGIR</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                </div>
                <div class="col-sm-6 mb-3">
                    <label>Precio del producto</label>
                        <select name="price" id="price" wire:model.lazy='price' class="form-control">
                            <option value="Elegir">Elegir</option>
                            <option value="525">525</option>
                            <option value="525">580</option>
                            <option value="600">600</option>
                            <option value="623">623</option>
                        </select>
                </div>
                <div class="col-sm-6 mb-3">
                    <label>Servicios profesionales</label>
                    <select name="total_manoobra" id="total_manoobra" wire:model.lazy='total_manoobra' class="form-control">
                        <option value="Elegir">Elegir</option>
                        <option value="35">35</option>
                    </select>
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

@include('commom.modalFooter')