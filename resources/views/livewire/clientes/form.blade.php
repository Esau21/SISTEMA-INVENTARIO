@include('commom.modalHead')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h6>Registrar cliente nuevo</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" wire:model.lazy="name" class="form-control" placeholder="Nombre del cliente">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" wire:model.lazy="direccion" class="form-control" placeholder="Dirección">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" wire:model.lazy="nit" class="form-control" placeholder="NIT">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" wire:model.lazy="nrc" class="form-control" placeholder="NRC">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" wire:model.lazy="giro" class="form-control" placeholder="Giro">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" wire:model.lazy="telefono" class="form-control" placeholder="Teléfono">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('commom.modalFooter')