<?php

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];

    // Mensajes de Activacion Correcta
    if ($msg == "cc01") {
        echo "<div class=\"container alert alert-success\" role=\"alert\"> El paciente se ha actualizado correctamente </div>";
    }
    if ($msg == "cc02") {
        echo "<div class=\"container alert alert-success\" role=\"alert\"> Los datos se han actualizado correctamente </div>";
    }
    
    //Mensaje de Errores Comunes
    if ($msg == "aa00") {
        echo "<div class=\"container alert alert-danger\" role=\"alert\">El nombre del paciente se encuentra mal escrito y no se puede ubicar </div>";
    }
    if ($msg == "aa01") {
        echo "<div class=\"container alert alert-danger\" role=\"alert\"> El nuevo paciente que deseas registrar, Ya existe.<br> Intenta con un nuevo nombre </div>";
    }
    if ($msg == "aa02") {
        echo "<div class=\"container alert alert-danger\" role=\"alert\"> El paciente que deseas ver, no se encuentra en la base de datos</div>";
    }
    if ($msg == "aa03") {
        echo "<div class=\"container alert alert-warning\" role=\"alert\"> El paciente que deseas ver, no cuenta con un historial, puedes agregarlo en el formulario de abajo</div>";
    }
    if ($msg == "aa04") {
        echo "<div class=\"container alert alert-warning\" role=\"alert\"> No existe paciente por mostrar, agrega uno en el boton de nuevo paciente</div>";
    }

    //Mensajes De Errores en Procesos Internos
    if ($msg == "ef01") {
        echo "<div class=\"container alert alert-danger\" role=\"alert\"> Ocurrio un error al registrar el nuevo paciente en la base de datos, por favor intentelo de nuevo y si el error persiste, contacte con el desarrollador </div>";
    }
    if ($msg == "ef02") {
        echo "<div class=\"container alert alert-danger\" role=\"alert\"> Ocurrio un error al registrar el historial en la base de datos, por favor intentelo de nuevo y si el error persiste, contacte con el desarrollador </div>";
    }
    if ($msg == "ef03") {
        echo "<div class=\"container alert alert-danger\" role=\"alert\"> Ocurrio un error al editar los datos del paciente,  por favor intentelo de nuevo y si el error persiste, contacte con el desarrollador </div>";
    }

} else {
    
}
?>