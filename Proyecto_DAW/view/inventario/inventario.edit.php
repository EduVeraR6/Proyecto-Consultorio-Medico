<!-- incluimos  Encabezado -->
<?php require_once HEADER; ?>

<div class="container">
    <h2>
        <?php echo $titulo ?>
    </h2>
    <div class="card card-body">

        <form action="index.php?c=inventario&f=edit" method="POST" name="formProdNuevo" id="formProdNuevo">

            <input type="hidden" name="id" id="id" value="<?php echo $prod['id_inventario']; ?>" />
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $prod['in_nombre']; ?>"
                        class="form-control" placeholder="nombre" required>
                </div>


                <div class="form-group col-sm-6">
                    <label for="precio">Cantidad</label>
                    <input type="number" name="cantidad" id="cantidad" value="<?php echo $prod['in_cantdispon']; ?>"
                        class="form-control" placeholder="cantidad" required>
                </div>

                <div class="form-group col-sm-6">
                    <label for="nombre">Categoria</label>
                    <input type="text" name="categoria" id="categoria" value="<?php echo $prod['in_catego']; ?>"
                        class="form-control" placeholder="categoria" required>
                </div>

                <div class="form-group col-sm-6">
                    <label for="precio">Proveedor</label>
                    <input type="text" name="proveedor" id="proveedor" value="<?php echo $prod['in_proveed']; ?>"
                        class="form-control" placeholder="proveedor" required>
                </div>

                <div class="form-group col-sm-6">
                    <label for="nombre">Fecha de vencimiento</label>
                    <input type="date" name="fecha" id="fecha" value="<?php echo $prod['in_fechaven']; ?>"
                        class="form-control" placeholder="fecha" required>
                </div>



                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary"
                        onclick="if (!confirm('Esta seguro de modificar el producto?')) return false;">Guardar</button>
                    <a href="index.php?c=inventario&f=index" class="btn btn-primary">Cancelar</a>
                </div>

            </div>
        </form>
    </div>
</div>

<!-- incluimos  pie de pagina -->
<?php require_once FOOTER; ?>