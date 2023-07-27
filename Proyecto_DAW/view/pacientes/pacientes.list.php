<!--autor:CABRERA GAMBOA MAXIMILIANO-->

<?php require_once HEADER; ?>

<div class="container">
<h2> <?php echo $titulo?></h2>
    <div class="row">
        <div class="col-sm-6">
            <form action="index.php?c=pacientes&f=search" method="POST">
                <input type="text" name="b" id="busqueda"  placeholder="buscar..."/>
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>Buscar</button>
            </form>       
        </div>
        <div class="col-sm-6 d-flex flex-column align-items-end">
            <a href="index.php?c=pacientes&f=view_new"> 
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-plus"></i> 
                   Nuevo</button>

            </a>
        </div>
    </div>
    <div class="table-responsive mt-2">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
            <th>Nombre </th>
            <th>Apellido </th>
            <th>fecha Nacimiento </th>
            <th>Genero </th>
            <th>Direccion </th>
            <th>Telefono </th>
            <th>Historial Medico </th>
            <th>Alergias </th>
            <th>Acciones</th>
            </thead>
            <tbody class="tabladatos">
                <?php         
                foreach ($resultados as $fila) {
                  ?>
                <tr>
                    <td><?php echo $fila['Nombre'];?></td>
                    <td><?php echo $fila['Apellido'];?></td>
                    <td><?php echo $fila['FechaNacimiento'];?></td>
                    <td><?php echo $fila['Genero'];?></td>
                    <td><?php echo $fila['Direccion'];?></td>
                    <td><?php echo $fila['Telefono'];?></td>
                    <td><?php echo $fila['HistorialMedico'];?></td>
                    <td><?php echo $fila['Alergias'];?></td>
                    <td>
                        <a class="btn btn-primary" 
                    href="index.php?c=pacientes&f=view_edit&id=<?php echo  $fila['ID_Paciente']; ?>">
                    <i class="fas fa-marker"></i></a>
                    <a class="btn btn-danger" 
                   onclick="if(!confirm('Esta seguro de eliminar el producto?'))return false;" 
                    href="index.php?c=pacientes&f=delete&id=<?php echo  $fila['ID_Paciente']; ?>">
                    <i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php  }?>
            </tbody>
        </table>
    </div>

</div>
<?php  require_once FOOTER ?>