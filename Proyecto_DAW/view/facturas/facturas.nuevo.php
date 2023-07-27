<!-- Sergio Torres Jimenez-->
<?php require_once HEADER; ?>

<div class="container">
    <h2>
        <?php echo $titulo ?>
    </h2>
    <div class="card card-body">

        <form action="index.php?c=facturas&f=new" method="POST" name="formFacturaNuevo" id="formFacturaNuevo">

            <div class="form-row">

                <div class="form-group col-sm-6">
                    <label for="cliente">Cliente</label>
                    <input type="text" name="cliente" id="cliente" class="form-control"
                        placeholder="Nombres del Cliente" required>
                </div>

                <div class="form-group col-sm-6">
                    <label for="monto">Monto</label>
                    <input type="number" name="monto" id="monto" class="form-control" placeholder="Monto total"
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
                    <input type="date" name="fechavencimiento" id="fechavencimiento" class="form-control"
                        placeholder="Fecha de Vencimiento" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="fechaemision">Fecha Emision</label>
                    <input type="date" name="fechaemision" id="fechaemision" class="form-control"
                        placeholder="Fecha de Emision" required>
                </div>



                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary">Guardar</button>

                    <a href="index.php?c=citas&f=index" class="btn btn-primary">
                        Cancelar</a>
                </div>

            </div>
        </form>


    </div>
</div>

<!-- incluimos  pie de pagina -->
<?php require_once FOOTER; ?>