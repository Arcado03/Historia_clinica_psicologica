<a name="datospersonales"></a>
<div class="container mt-5 bg-light">
    <a href="index.php"><button class="btn btn-light my-2 mr-1">Regresar</button></a>
    <a href="#nuevaconsulta"><button type="submit" class="btn btn-primary float-right my-2" value="Actualizar Historial">Agregar Consulta</button></a>
    <a href="index.php?id=78858&fun=nt27&name=<?php echo $name;?>"><button type="submit" class="btn btn-secondary float-right my-2 mx-5" value="Actualizar Historial">Editar Datos Personales</button></a>
    <br> <br>    <br> 
    <h2 align='center'>Datos Personales</h2>
    <?php
    include "funciones.php";
    ?>
    <hr>
</div>


<a name="nuevaconsulta"></a>
<form action="funciones.php?fun=nt25&name=<?php echo $name;?>" method="post">
    <div class="container mt-5 bg-light">
        <h2 align='center'>Actualizacion Historia Clinica</h2>
        <div class="form-group">
            <label for="inputMotivo">Nuevo Motivo de Consulta</label>
            <textarea rows="3" class="form-control" name="inputMotivo" placeholder="Nuevo motivo de consultas" ></textarea>
        </div>
        <div class="form-group">
            <label for="inputDescripcion">Nueva Descripcion del Paciente</label>
            <textarea rows="3" class="form-control" name="inputDescripcion" placeholder="El pacientes ahora es..."></textarea>
        </div>
        <div class="form-group">
            <label for="inputLenguaje">Nuevo Lenguaje</label>
            <textarea rows="3" class="form-control" name="inputLenguaje" placeholder="El lenguaje del paciente ahora es..."></textarea>
        </div>
        <div class="form-group">
            <label for="inputPadecimiento">Nuevo Padecimiento Actual</label>
            <textarea rows="3" class="form-control" name="inputPadecimiento" placeholder="El padecimento actual es..."></textarea>
        </div>
        <div class="form-group">
            <label for="inputAntecedentesP">Nuevos Antecedentes Personales no Patológicos</label>
            <textarea rows="3" class="form-control" name="inputAntecendetesP" placeholder="Tiene por antecedentes no patologicos nuevos..."></textarea>
        </div>
        <div class="form-group">
            <label for="inputPatologias">Nuevos Antecedentes Heredofamiliares (Patologías)</label>
            <textarea rows="3" class="form-control" name="inputPatologias" placeholder="El pacientes ahora tiene..."></textarea>
        </div>
        <div class="form-group">
            <label for="inputDiagnostico">Nuevo Diagnóstico</label>
            <textarea rows="3" class="form-control" name="inputDiagnostico" placeholder="Nuevo Diagnostico..."></textarea>
        </div>
        <div class="form-group">
            <label for="inputTratamiento">Nuevas Sugerencia de Tratamiento</label>
            <textarea rows="3" class="form-control" name="inputTratamiento" placeholder="Nuevas Sugerencias..."></textarea>
        </div>
        <hr>
        <input type="submit" class="btn btn-primary float-right my-2" value="Actualizar Historial">    
    </div>
</form>

<div class="container bg-light mt-0">
    <a href="#datospersonales"><button class="btn btn-light my-2 mr-1">Volver</button></a>
</div>


