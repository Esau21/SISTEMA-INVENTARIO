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
                        <option value="Llantas para excavadoras">Llantas para excavadoras</option>
                        <option value="Llantas para tractores de orugas">Llantas para tractores de orugas</option>
                        <option value="Llantas para tractores de ruedas">Llantas para tractores de ruedas</option>
                        <option value="Llantas industriales">Llantas industriales</option>
                        <option value="Llantas de alta resistencia">Llantas de alta resistencia</option>
                        <option value="Llantas para terrenos difíciles">Llantas para terrenos difíciles</option>
                        <option value="Llantas antipinchazos">Llantas antipinchazos</option>
                        <option value="Llantas con sistema de autolimpieza">Llantas con sistema de autolimpieza</option>
                        <option value="Servicio de montaje de llantas">Servicio de montaje de llantas</option>
                        <option value="Servicio de equilibrado de llantas">Servicio de equilibrado de llantas</option>
                        <option value="Reparación de llantas">Reparación de llantas</option>
                        <option value="Recubrimiento de llantas">Recubrimiento de llantas</option>
                        <option value="Venta de llantas usadas">Venta de llantas usadas</option>
                        <option value="Venta de llantas de segunda mano">Venta de llantas de segunda mano</option>
                        <option value="Venta de neumáticos para tractores">Venta de neumáticos para tractores</option>
                        <option value="Venta de neumáticos para excavadoras">Venta de neumáticos para excavadoras
                        </option>
                        <option value="Venta de cámaras para llantas">Venta de cámaras para llantas</option>
                        <option value="Venta de rines para llantas">Venta de rines para llantas</option>
                        <option value="Venta de herramientas para montaje de llantas">Venta de herramientas para montaje
                            de llantas</option>
                        <option value="Venta de sistemas de control de presión de llantas">Venta de sistemas de control
                            de presión de llantas</option>
                        <option value="Venta de repuestos para llantas">Venta de repuestos para llantas</option>
                        <option value="Asesoramiento en selección de llantas">Asesoramiento en selección de llantas
                        </option>
                        <option value="Asesoramiento en mantenimiento de llantas">Asesoramiento en mantenimiento de
                            llantas</option>
                        <option value="Asesoramiento en seguridad para llantas">Asesoramiento en seguridad para llantas
                        </option>
                        <option value="Formación y capacitación en montaje de llantas">Formación y capacitación en
                            montaje de llantas</option>
                        <option value="Formación y capacitación en mantenimiento de llantas">Formación y capacitación en
                            mantenimiento de llantas</option>
                        <option value="Formación y capacitación en seguridad para llantas">Formación y capacitación en
                            seguridad para llantas</option>
                        <option value="Análisis de desgaste de llantas">Análisis de desgaste de llantas</option>
                        <option value="Inspección de llantas">Inspección de llantas</option>
                        <option value="Diagnóstico de problemas de llantas">Diagnóstico de problemas de llantas</option>
                        <option value="Gestión de flotas de llantas">Gestión de flotas de llantas</option>
                        <option value="Planificación de reemplazo de llantas">Planificación de reemplazo de llantas
                        </option>
                        <option value="Monitoreo remoto de llantas">Monitoreo remoto de llantas</option>
                        <option value="Programas de mantenimiento preventivo para llantas">Programas de mantenimiento
                            preventivo para llantas</option>
                        <option value="Programas de mantenimiento predictivo para llantas">Programas de mantenimiento
                            predictivo para llantas</option>
                        <option value="Gestión de inventario de llantas">Gestión de inventario de llantas</option>
                        <option value="Análisis de costos de llantas">Análisis de costos de llantas</option>
                        <option value="Optimización de la vida útil de las llantas">Optimización de la vida útil de las
                            llantas</option>
                        <option value="Asesoramiento en retiro de llantas">Asesoramiento en retiro de llantas</option>
                        <option value="Reciclaje de llantas">Reciclaje de llantas</option>
                        <option value="Disposición de llantas usadas">Disposición de llantas usadas</option>
                        <option value="Transporte de llantas">Transporte de llantas</option>
                        <option value="Seguro para llantas">Seguro para llantas</option>
                        <option value="Financiamiento para llantas">Financiamiento para llantas</option>
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

@include('commom.modalFooter')