<!--autor:CABRERA GAMBOA MAXIMILIANO-->

<?php require_once HEADER; ?>

<div class="container">
<h2> <?php echo $titulo?></h2>
    <div class="card card-body">
    
        <form action="index.php?c=pacientes&f=edit" method="POST" name="formPacienNuevo" id="formPacienNuevo">
        
        <input type="hidden" name="id" id="id" value="<?php echo $pacie['ID_Paciente']; ?>"/>
            <div class="form-row">
               <div class="form-group col-sm-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $pacie['Nombre']; 
                    ?>" class="form-control" placeholder="Nombre Paciente" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido" id="apellido" value="<?php echo $pacie['Apellido']; 
                    ?>" class="form-control" placeholder="Apellido Paciente" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="fechaNacimiento">fecha Nacimiento</label>
                    <input type="date" name="fechaNacimiento" id="fechaNacimiento" value="<?php echo $pacie['FechaNacimiento']; 
                    ?>" class="form-control" placeholder="fecha Nacimiento del Paciente" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="genero">Genero</label><br>
                    <select name="genero" id="genero">
                            <?php
                            if($pacie['Genero']=="Masculino")
                            {
                            ?> 
                             <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                            <?php
                            }
                            ?> 
                            <?php
                            if($pacie['Genero']=="Femenino")
                            {
                            ?> 
                            <option value="Femenino">Femenino</option>
                            <option value="Masculino">Masculino</option>
                            <?php
                            }
                            ?> 



                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="direccion">Direccion</label>
                    <input type="text" name="direccion" id="direccion" value="<?php echo $pacie['Direccion']; 
                    ?>" class="form-control" placeholder="Direccion del Paciente" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="telefono">Telefono</label>
                    <input type="text" name="telefono" id="telefono" value="<?php echo $pacie['Telefono']; 
                    ?>" class="form-control" placeholder="telefono del Paciente" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="historialMedico">Historial Medico</label>
                    <input type="text" name="historialMedico" id="historialMedico" value="<?php echo $pacie['HistorialMedico']; 
                    ?>" class="form-control" placeholder="historial Medico del Paciente" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="alergias">Alergias</label>
                    <input type="text" name="alergias" id="alergias" value="<?php echo $pacie['Alergias']; 
                    ?>" class="form-control" placeholder="Alergias del Paciente" required>
                </div>
                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary"
                     onclick="if (!confirm('Esta seguro de modificar el registro del paciente?')) return false;" >Guardar</button>
                    <a href="index.php?c=pacientes&f=index" class="btn btn-primary">Cancelar</a>
                </div>
            </div>  
        </form>
    </div>
</div>

<!-- incluimos  pie de pagina -->
<?php require_once FOOTER; ?>
