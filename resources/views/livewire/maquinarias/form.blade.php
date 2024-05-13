@include('commom.modalHead')

<div class="div">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h6 class="text-center text-uppercase">Agregar nuevo servico de maquinaria</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" wire:model.lazy='name'
                                placeholder="Ingresa el nombre del del vehiculo">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Descripcion</label>
                            <textarea name="description" id="description" wire:model.lazy='description'
                                class="form-control" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Estado</label>
                            <select class="form-control" name="status" id="status" wire:model.lazy='status'>
                                <option value="Elegir">Elegir</option>
                                <option value="DISPONIBLE">DISPONIBLE</option>
                                <option value="ENTREGADO">ENTREGADO</option>
                                <option value="PRESTADO">PRESTADO</option>
                                <option value="EN-ESPERA">EN-ESPERA</option>
                                <option value="RETARDADO">RETARDADO</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Fecha Salida</label>
                            <input type="date" class="form-control" wire:model.lazy='fecha_salida'>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Fecha Entrega</label>
                            <input type="date" class="form-control" wire:model.lazy='fecha_entrega'>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Hora Salida</label>
                            <input type="time" class="form-control" wire:model.lazy='hora_salida'>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Hora Entrega</label>
                            <input type="time" class="form-control" wire:model.lazy='hora_entrega'>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Precio</label>
                            <input type="number" class="form-control" wire:model.lazy='price' placeholder="ingresa el precio">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Iva(0.13%)</label>
                            <input type="number" class="form-control" wire:model.lazy='iva' disabled>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Total</label>
                            <input type="number" class="form-control" wire:model.lazy='total' disabled>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Año</label>
                            <input type="text" class="form-control" wire:model.lazy='year'
                                placeholder="Ingresa el año del vehiculo">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label>Marca(modelo)</label>
                        <select name="model" id="model" wire:model.lazy='model' class="form-control">
                            <option value="Elegir">Elegir</option>
                            <optgroup label="Excavadoras">
                                <option value="Caterpillar">Caterpillar</option>
                                <option value="Komatsu">Komatsu</option>
                                <option value="Volvo">Volvo</option>
                                <option value="Hitachi">Hitachi</option>
                                <option value="John Deere">John Deere</option>
                            </optgroup>
                            <optgroup label="Cargadoras frontales">
                                <option value="Caterpillar">Caterpillar</option>
                                <option value="Komatsu">Komatsu</option>
                                <option value="Volvo">Volvo</option>
                                <option value="Doosan">Doosan</option>
                                <option value="Case">Case</option>
                            </optgroup>
                            <optgroup label="Retroexcavadoras">
                                <option value="Caterpillar">Caterpillar</option>
                                <option value="Komatsu">Komatsu</option>
                                <option value="Volvo">Volvo</option>
                                <option value="JCB">JCB</option>
                                <option value="John Deere">John Deere</option>
                            </optgroup>
                        </select>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Imagen</label>
                            <input type="file" class="form-control" wire:model.lazy='image'>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Selecciona un cliente</label>
                            <select name="clienteId" id="clienteId" wire:model.lazy='clienteId' class="form-control">
                                <option value="Elegir">Elegir</option>
                                @foreach ($clientes as $c)
                                <option value="{{$c['id']}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('commom.modalFooter')