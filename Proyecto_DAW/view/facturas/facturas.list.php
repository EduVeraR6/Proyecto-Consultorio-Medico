<!-- Sergio Torres Jimenez -->
<?php require_once HEADER; ?>

<div class="container">
    <h2>
        <?php echo $titulo ?>
    </h2>
    <div class="row">
        <div class="col-sm-6">
            <form action="index.php?c=facturas&f=search" method="POST">
                <input type="text" name="b" id="busqueda" placeholder="buscar..." />
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>Buscar</button>
            </form>
        </div>
        <div class="col-sm-6 d-flex flex-column align-items-end">
            <a href="index.php?c=facturas&f=view_new">
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    Nuevo</button>

            </a>
        </div>
    </div>
    <div class="table-responsive mt-2">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <th>Cliente</th>
                <th>Fecha Emision</th>
                <th>Fecha Vencimiento</th>
                <th>Monto</th>
                <th>Estado</th>
                <th>Acciones</th>
            </thead>
            <?php
            if (is_array($resultados) || is_object($resultados)) {
                foreach ($resultados as $fila) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $fila['cliente']; ?>
                        </td>
                        <td>
                            <?php echo $fila['fechaemision']; ?>
                        </td>
                        <td>
                            <?php echo $fila['fechavencimiento']; ?>
                        </td>
                        <td>
                            <?php echo $fila['monto']; ?>
                        </td>
                        <td>
                            <?php echo $fila['estado']; ?>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="index.php?c=facturas&f=view_edit&id=<?php echo $fila['idfacturas']; ?>">
                                <i class="fas fa-marker"></i>
                            </a>
                            <a class="btn btn-danger" onclick="if(!confirm('Esta seguro de eliminar la factura?'))return false;"
                                href="index.php?c=facturas&f=delete&id=<?php echo $fila['idfacturas']; ?>">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                }
            } else {
                echo "<tr><td colspan='6'>No se encontraron resultados</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>

</div>
<?php require_once FOOTER ?>