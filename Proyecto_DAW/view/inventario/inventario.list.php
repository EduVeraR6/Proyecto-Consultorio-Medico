<!--autor: Piguave Saltos Marlon-->
<?php require_once HEADER; ?>

<div class="container">
<h2> <?php echo $titulo?></h2>
    <div class="row">
        <div class="col-sm-6">
            <form action="index.php?c=inventario&f=search" method="POST">
                <input type="text" name="b" id="busqueda"  placeholder="buscar..."/>
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>Buscar</button>
            </form>       
        </div>
        <div class="col-sm-6 d-flex flex-column align-items-end">
            <a href="index.php?c=inventario&f=view_new"> 
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
            <th>Cantidad Disponible </th>
            <th>Categoria </th>
            <th>Proveedor </th>
            <th>Fecha de Vencimiento </th>
            <th>Acciones </th>
            </thead>
            <tbody class="tabladatos">
                <?php         
                foreach ($resultados as $fila) {
                  ?>
                <tr>
                    <td><?php echo $fila['in_nombre'];?></td>
                    <td><?php echo $fila['in_cantdispon'];?></td>
                    <td><?php echo $fila['in_catego'];?></td>
                    <td><?php echo $fila['in_proveed'];?></td>
                    <td><?php echo $fila['in_fechaven'];?></td>
                    <td>
                        <a class="btn btn-primary" 
                    href="index.php?c=inventario&f=view_edit&id=<?php echo  $fila['id_inventario']; ?>">
                    <i class="fas fa-marker"></i></a>
                    <a class="btn btn-danger" 
                   onclick="if(!confirm('Esta seguro de eliminar el medicamento?'))return false;" 
                    href="index.php?c=inventario&f=delete&id=<?php echo  $fila['id_inventario']; ?>">
                    <i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php  }?>
            </tbody>
        </table>
    </div>

</div>
<?php  require_once FOOTER ?>