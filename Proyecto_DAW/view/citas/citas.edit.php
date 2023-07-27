<!-- Eduardo Vera Romero -->
<?php require_once HEADER; ?>

<div class="container">
    <h2>
        <?php echo $titulo ?>
    </h2>
    <div class="card card-body">

        <form action="index.php?c=citas&f=edit" method="POST" name="formCitaNuevo" id="formCitaNuevo">

            <input type="hidden" name="id" id="id" value="<?php echo $cita['idcitas']; ?>" />
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="nombre">Nombres</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $cita['paciente']; ?>"
                        class="form-control" placeholder="Nombres del Paciente" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="especialidad">Especialidad</label>
                    <select name="especialidad" id="especialidad" class="form-control" required>
                        <option value="">Seleccione una especialidad</option>
                        <option value="cardiología">Cardiología</option>
                        <option value="dermatología">Dermatología</option>
                        <option value="ginecología">Ginecología</option>
                        <option value="neumología">Neumología</option>
                        <option value="oftalmología">Oftalmología</option>
                        <option value="pediatría">Pediatría</option>
                    </select>
                </div>

                <div class="form-group col-sm-6">
                    <label for="motivo">Motivo</label>
                    <input type="text" name="motivo" id="motivo" value="<?php echo $cita['motivo']; ?>"
                        class="form-control" placeholder="Motivo de la Consulta" required>
                </div>

                <div class="form-group col-sm-6">
                    <label for="fecha">Fecha</label>
                    <input type="date" name="fecha" id="fecha" value="<?php echo $cita['fecha']; ?>" class="form-control"
                        placeholder="Fecha de la Consulta" required>
                </div>

                <div class="form-group col-sm-6">
                    <label for="medico">Médico</label>
                    <br>
                    <input type="radio" name="medico" value="Dr. Juan Perez" required>Dr. Juan Perez<br>
                    <input type="radio" name="medico" value="Dra. Maria Rodriguez">Dra. Maria Rodriguez<br>
                    <input type="radio" name="medico" value="Dr. Luis Gomez">Dr. Luis Gomez<br>
                </div>

                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary"
                        onclick="if (!confirm('Esta seguro de modificar esta cita?')) return false;">Guardar</button>
                    <a href="index.php?c=citas&f=index" class="btn btn-primary">Cancelar</a>
                </div>

            </div>
        </form>
    </div>
</div>

<!-- incluimos  pie de pagina -->
<?php require_once FOOTER; ?>