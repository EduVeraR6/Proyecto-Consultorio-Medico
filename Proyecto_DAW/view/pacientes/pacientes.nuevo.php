<!--autor:CABRERA GAMBOA MAXIMILIANO-->

<?php require_once HEADER; ?>

<div class="container">
<h2> <?php echo $titulo?></h2>
    <div class="card card-body">
        <form action="index.php?c=pacientes&f=new" method="POST" name="formPacienNuevo" id="formPacienNuevo">
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="nombre del paciente" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido" id="apellido" class="form-control" placeholder="apellido del paciente" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="fechaNacimiento">Fecha de Nacimiento</label>
                    <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control"  placeholder="Fecha de Nacimiento del paciente" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="genero">Genero</label><br>
                    <select name="genero" id="genero">
                        <option value="Seleccione">Seleccione</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="direccion">Direccion</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Direccion de domicilio del paciente" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="telefono">Telefono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" placeholder="telefono del paciente" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="historialMedico">Historial Medico</label>
                    <input type="text" name="historialMedico" id="historialMedico" class="form-control" placeholder="Historial Medico del paciente" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="alergias">Alergias</label>
                    <input type="text" name="alergias" id="alergias" class="form-control" placeholder="alergias del paciente" required>
                </div>

     


                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="index.php?c=pacientes&f=index" class="btn btn-primary">
                        Cancelar</a>
                </div>
            </div>  
        </form>


    </div>
</div>

<!-- incluimos  pie de pagina -->
<?php require_once FOOTER; ?>
