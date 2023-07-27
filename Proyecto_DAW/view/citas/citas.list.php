<!-- Eduardo Vera Romero -->
<?php require_once HEADER; ?>

<div class="container">
    <h2>
        <?php echo $titulo ?>
    </h2>
    <div class="row">
        <div class="col-sm-6">
            <form action="index.php?c=citas&f=search" method="POST">
                <input type="text" name="b" id="busqueda" placeholder="buscar..." />
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>Buscar</button>
            </form>
        </div>
        <div class="col-sm-6 d-flex flex-column align-items-end">
            <a href="index.php?c=citas&f=view_new">
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    Nuevo</button>

            </a>
        </div>
    </div>
    <div class="table-responsive mt-2">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <th>Nombres</th>
                <th>Especialidad </th>
                <th>Motivo </th>
                <th>Fecha</th>
                <th>Medico </th>
                <th>Acciones </th>
            </thead>
            <!-- llamar los campos tal y cual estan en la BD-->
            <?php
            if (is_array($resultados) || is_object($resultados)) {
                foreach ($resultados as $fila) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $fila['paciente']; ?>
                        </td>
                        <td>
                            <?php echo $fila['especialidad']; ?>
                        </td>
                        <td>
                            <?php echo $fila['motivo']; ?>
                        </td>
                        <td>
                            <?php echo $fila['fecha']; ?>
                        </td>
                        <td>
                            <?php echo $fila['medico']; ?>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="index.php?c=citas&f=view_edit&id=<?php echo $fila['idcitas']; ?>">
                                <i class="fas fa-marker"></i>
                            </a>
                            <a class="btn btn-danger" onclick="if(!confirm('Esta seguro de eliminar la cita?'))return false;"
                                href="index.php?c=citas&f=delete&id=<?php echo $fila['idcitas']; ?>">
                                <i class="fas fa-trash-alt"></i>
                            </a><!-- asegurarse que la url sea la correcta-->
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