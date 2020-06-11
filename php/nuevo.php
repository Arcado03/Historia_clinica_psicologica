<form action="funciones.php?fun=nt78" method="post">
    <div class="container mt-5 bg-light">
        <br><br>
        <h2 align='center'>Datos Personales</h2>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputNombre">Nombre</label>
                <input type="text" class="form-control" name="inputNombre" placeholder="Nombre Completo" required>
            </div>
            <div class="form-group col-md-2">
                <label for="inputEdad">Edad</label>
                <input  type="number" class="form-control" name="inputEdad" placeholder="1" min="1" max="99">
            </div>
            <div class="form-group col-md-2">
                <label for="inputSexo">Sexo</label>
                <select name="inputSexo" class="form-control">
                    <option selected>Mujer</option>
                    <option>Hombre</option>
                    <option>Otro</option>
                    <option>Sin Especificar</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="inputECivil">Estado Civil</label>
                <input type="text" class="form-control" name="inputECivil" placeholder="Soltero">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputOcupacion">Ocupación</label>
                <input  type="text" class="form-control" name="inputOcupacion" placeholder="Administrador en">
            </div>
            <div class="form-group col-md-3">
                <label for="inputProfesion">Profesión</label>
                <input  type="text" class="form-control" name="inputProfesion" placeholder="Licenciatura en ">
            </div>
            <div class="form-group col-md-3">
                <label for="inputEscolaridad">Escolaridad</label>
                <input  type="text" class="form-control" name="inputEscolaridad" placeholder="Preparatoria">
            </div>            
            <div class="form-group col-md-3">
                <label for="inputReferido">Datos Referido por</label>
                <input type="text" class="form-control" name="inputReferido" placeholder="Facebook">
            </div>
        </div>
        <hr>
        <div class="form-group">
            <label for="inputDireccion">Dirección</label>
            <input type="text" class="form-control" name="inputDireccion" placeholder="Calle #00, Col. Nueva, Estado, CP">
        </div>
        <div class="form-group">
            <label for="inputAntecedentesL">Antecedentes Legales</label>
            <input type="text" class="form-control" name="inputAntecedentesL" placeholder="Sin especificar">
        </div>
        <hr>
        <h2 align='center'>Historia Clinica</h2>
        <div class="form-group">
            <label for="inputMotivo">Motivo de Consulta</label>
            <textarea rows="3" class="form-control" name="inputMotivo" placeholder="Vino a consulta por..." ></textarea>
        </div>
        <div class="form-group">
            <label for="inputDescripcion">Descripcion del Paciente</label>
            <textarea rows="3" class="form-control" name="inputDescripcion" placeholder="El pacientes es..."></textarea>
        </div>
        <div class="form-group">
            <label for="inputLenguaje">Lenguaje</label>
            <textarea rows="3" class="form-control" name="inputLenguaje" placeholder="El lenguaje del paciente es..."></textarea>
        </div>
        <div class="form-group">
            <label for="inputPadecimiento">Padecimiento Actual</label>
            <textarea rows="3" class="form-control" name="inputPadecimiento" placeholder="El padecimento es..."></textarea>
        </div>
        <div class="form-group">
            <label for="inputAntecedentesP">Antecedentes Personales no Patológicos</label>
            <textarea rows="3" class="form-control" name="inputAntecendetesP" placeholder="Tiene por antecedentes no patologicos..."></textarea>
        </div>
        <div class="form-group">
            <label for="inputPatologias">Antecedentes Heredofamiliares (Patologías)</label>
            <textarea rows="3" class="form-control" name="inputPatologias" placeholder="El pacientes tiene..."></textarea>
        </div>
        <div class="form-group">
            <label for="inputDiagnostico">Diagnóstico</label>
            <textarea rows="3" class="form-control" name="inputDiagnostico" placeholder="..."></textarea>
        </div>
        <div class="form-group">
            <label for="inputTratamiento">Sugerencia de Tratamiento</label>
            <textarea rows="3" class="form-control" name="inputTratamiento" placeholder="Sugerencia..."></textarea>
        </div>
        <hr>
        <input type="submit" class="btn btn-primary float-right my-2" value="Dar de Alta">    
    </div>
</form>

<div class="container bg-light mt-0">
    <a href="index.php"><button class="btn btn-light my-2 mr-1">Regresar</button></a>
</div>
