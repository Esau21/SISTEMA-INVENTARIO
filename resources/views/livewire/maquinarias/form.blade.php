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
                            <select name="name" id="name" wire:model.lazy='name' class="form-control">
                                <option value="Elegir">Elegir</option>
                                <option value="Retroexcavadora CAT 416 F2">Retroexcavadora CAT 416 F2</option>
                                <option value="Mini bobcat Caterpillar 246 D3">Mini bobcat Caterpillar 246 D3</option>
                                <option value="Excavadora Caterpillar 375">Excavadora Caterpillar 375</option>
                                <option value="Excavadora Caterpillar 320">Excavadora Caterpillar 320</option>
                            </select>

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

                            <select name="hora_salida" id="hora_salida" wire:model.lazy='hora_salida'
                                class="form-control">
                                <option value="Elegir">Elegir</option>
                                <?php
                                $hora_salida = strtotime('8:00:00');
                                $hora_entrega = strtotime('20:00:00');

                                while ($hora_salida <= $hora_entrega) {
                                    echo '<option value="' . date('H:i', $hora_salida) . '">' . date('h:i A', $hora_salida) . '</option>';
                                    $hora_salida += 1800;
                                }
                                
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Hora Entrega</label>

                            <select name="hora_entrega" id="hora_entrega" wire:model.lazy='hora_entrega'
                                class="form-control">
                                <option value="Elegir">Elegir</option>
                                <?php
                                $hora_salida = strtotime('8:00:00');
                                $hora_entrega = strtotime('20:00:00');

                                while ($hora_salida <= $hora_entrega) {
                                    echo '<option value="' . date('H:i', $hora_salida) . '">' . date('h:i A', $hora_salida) . '</option>';
                                    $hora_salida += 1800;
                                }
                                
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Precio</label>
                            <select wire:model.lazy='price' name="price" id="price" class="form-control">
                                <option value="Elegir">Elegir</option>
                                <option value="25">25</option>
                                <option value="60">60</option>
                                <option value="150">150</option>
                                <option value="175">175</option>
                                <option value="200">200</option>
                                <option value="480">480</option>
                                <option value="1200">1200</option>
                                <option value="1400">1400</option>
                                <option value="3000">3000</option>
                                <option value="6000">6000</option>
                                <option value="7200">7200</option>
                                <option value="14400">14400</option>
                                <option value="18000">18000</option>
                                <option value="21000">21000</option>
                                <option value="36000">36000</option>
                                <option value="42000">42000</option>
                            </select>
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