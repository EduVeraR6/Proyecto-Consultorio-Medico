<!-- Sergio Torres Jimenez -->
<?php require_once HEADER; ?>

<div class="container">
    <h2>
        <?php echo $titulo ?>
    </h2>
    <div class="card card-body">

        <form action="index.php?c=facturas&f=edit" method="POST" name="formFacturaNuevo" id="formFacturaNuevo">

            <input type="hidden" name="id" id="id" value="<?php echo $factura['idfacturas']; ?>" />

            <div class="form-row">

                <div class="form-group col-sm-6">
                    <label for="cliente">Cliente</label>
                    <input type="text" name="cliente" id="cliente" value="<?php echo $factura['cliente']; ?>"
                        class="form-control" placeholder="Nombres del Cliente" required>
                </div>


                <div class="form-group col-sm-6">
                    <label for="monto">Monto</label>
                    <input type="number" name="monto" id="monto" value="<?php echo $factura['monto']; ?>" class="form-control" placeholder="Monto total"
                        required>
                </div>


                <div class="form-group col-sm-6">
                    <label for="estado">Estado</label>
                    <select name="estado" id="estado" class="form-control" required>
                        <option value="">Seleccionar estado</option>
                        <option value="pendiente">Pendiente</option>
                        <option value="pagado">Pagado</option>
                    </select>
                </div>

                <div class="form-group col-sm-6">
                    <label for="fechavencimiento">Fecha Vencimiento</label>
                    <input type="date" name="fechavencimiento" id="fechavencimiento" value="<?php echo $factura['fechavencimiento']; ?>" class="form-control" placeholder="Fecha de Vencimiento"
                        required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="fechaemision">Fecha Emision</label>
                    <input type="date" name="fechaemision" id="fechaemision" value="<?php echo $factura['fechaemision']; ?>" class="form-control" placeholder="Fecha de Emision"
                        required>
                </div>

                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary"
                        onclick="if (!confirm('Esta seguro de modificar esta cita?')) return false;">Guardar</button>
                    <a href="index.php?c=facturas&f=index" class="btn btn-primary">Cancelar</a>
                </div>

            </div>
        </form>
    </div>
</div>


<?php require_once FOOTER; ?>