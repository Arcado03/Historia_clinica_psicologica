<?php

//Conexiones  (Usar Datos de la base de datos Propia)
//modificar esta funcion
$host1 = "127.0.0.1";
$user1 = "root";
$pass1 = "+4C3rN1S+";
$db1 = "historial";

//Selector de Funcion
if (isset($_GET['fun'])) {
    $fun = $_GET['fun'];
    if ($fun == "nt78") {
        nuevo($host1, $user1, $pass1, $db1);
    }
    if ($fun == "nt56") {
        mostrar($host1, $user1, $pass1, $db1, $name);
    }
    if ($fun == "nt25") {
        if (isset($_GET['name'])) {
            $name = $_GET['name'];
            agregar($host1, $user1, $pass1, $db1, $name);
        } else {
            echo "<script>self.location= 'index.php?msg=aa00'</script>";
        }
    }
    if ($fun == "nt27") {
        if (isset($_GET['name'])) {
            $name = $_GET['name'];
            editar($host1, $user1, $pass1, $db1, $name);
        } else {
            echo "<script>self.location= 'index.php?msg=aa00'</script>";
        }
    }
    if ($fun == "nt79") {
        actualizar($host1, $user1, $pass1, $db1);
    }
} else {
    listar($host1, $user1, $pass1, $db1);
}

//Funcion de agregar nuevo paciente
function nuevo($host, $user, $pass, $db) {
//Listado de Parametros 
    $iname = $_POST["inputNombre"];
    $iedad = $_POST["inputEdad"];
    $isexo = $_POST["inputSexo"];
    $yecivil = $_POST["inputECivil"];
    $ireferido = $_POST["inputReferido"];
    $iocupacion = $_POST["inputOcupacion"];
    $iprofesion = $_POST["inputProfesion"];
    $iescolaridad = $_POST["inputEscolaridad"];
    $idireccion = $_POST["inputDireccion"];
    $iantel = $_POST["inputAntecedentesL"];

    //revisa si ya existe el nombre para no repetir nombre
    $sql = "SELECT * FROM datos WHERE nombre='$iname';";
    $enlace = mysqli_connect($host, $user, $pass, $db) or die("Error al conectar con la base de datos");
    $result = mysqli_query($enlace, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>self.location= 'index.php?msg=aa01'</script>";
        mysqli_close($enlace);
    } else {
        mysqli_close($enlace);
        //conecion e insersion de datos
        $enlace = mysqli_connect($host, $user, $pass, $db) or die("Error al conectar con la base de datos");
        $sql = "INSERT INTO datos (nombre, edad, sexo, escolaridad, profesion, ocupacion, estcivil, domicilio, antecedentes, referido) VALUES ( '$iname', '$iedad', '$isexo','$iescolaridad','$iprofesion','$iocupacion', '$yecivil', '$idireccion', '$iantel', '$ireferido')";

        if (!mysqli_query($enlace, $sql)) {
            echo "<script>self.location= 'index.php?msg=ef01'</script>";
        } else {
            mysqli_close($enlace);
            //lama a funcion para argegar historia clinica
            agregar($host, $user, $pass, $db, $iname);
        }
    }
}

//funcion de agregar historia
function agregar($host, $user, $pass, $db, $name) {
    //Listado de Parametros
    $hmotivo = $_POST["inputMotivo"];
    $hdescrip = $_POST["inputDescripcion"];
    $hlenguaje = $_POST["inputLenguaje"];
    $hmpade = $_POST["inputPadecimiento"];
    $hantesP = $_POST["inputAntecendetesP"];
    $hpato = $_POST["inputPatologias"];
    $hdiag = $_POST["inputDiagnostico"];
    $htrata = $_POST["inputTratamiento"];

//Busca Primer Resultado con nombre
    $sql = "SELECT id FROM datos WHERE nombre='$name';";
    $enlace = mysqli_connect($host, $user, $pass, $db) or die("Error al conectar con la base de datos");
    $result = mysqli_query($enlace, $sql);


    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $ikey = $row["id"];
        //Inserta en la tabla de historia con el mismo id los datos restantes
        $sql2 = "INSERT INTO historia  (id,motivo,descrip,lenguaje,padecimiento,antnopato,antpato,diagnostico,tratamiento) VALUES ('$ikey','$hmotivo','$hdescrip','$hlenguaje','$hmpade','$hantesP','$hpato', '$hdiag','$htrata')";
        if (!mysqli_query($enlace, $sql2)) {
            echo "<script>self.location= 'index.php?msg=ef02'</script>";
        } else {
            echo "<script>self.location= 'index.php?id=78857&msg=cc01&fun=nt56&&name=" . $name . "'</script>";
        }
    } else {
        
    }
    mysqli_close($enlace);
}

//funcion de Listar pacientes
function listar($host, $user, $pass, $db) {
    $sql = "SELECT nombre FROM datos;";
    $enlace = mysqli_connect($host, $user, $pass, $db) or die("Error al conectar con la base de datos");
    $result = mysqli_query($enlace, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $link = str_replace(" ", "%20", $row["nombre"]);
            echo "<a href=\"index.php?id=78857&fun=nt56&&name=$link\" class=\"list-group-item list-group-item-action\">" . $row["nombre"] . "</a>";
        }
    } else {
          echo "<script>self.location= 'index.php?msg=aa04'</script>";
    }
}

//funcion de Mostrar historia
function mostrar($host, $user, $pass, $db, $name) {
    $sql = "SELECT * FROM datos WHERE nombre='$name';";
    $enlace = mysqli_connect($host, $user, $pass, $db) or die("Error al conectar con la base de datos");
    $result = mysqli_query($enlace, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $ikey = $row["id"];
        $iname = $row["nombre"];
        $iedad = $row["edad"];
        $isexo = $row["sexo"];
        $yecivil = $row["estcivil"];
        $ireferido = $row["referido"];
        $iocupacion = $row["ocupacion"];
        $iprofesion = $row["profesion"];
        $iescolaridad = $row["escolaridad"];
        $idireccion = $row["domicilio"];
        $iantel = $row["antecedentes"];

        echo "<div class=\"form-row\"><div class=\"form-group col-md-6\"><label for=\"inputNombre\">Nombre</label>
                <input type=\"text\" class=\"form-control\" name=\"inputNombre\" value=\"" . $iname . "\" readonly></div>
                <div class=\"form-group col-md-2\"><label for=\"inputEdad\">Edad</label><input  type=\"number\" class=\"form-control\" name=\"inputEdad\" value=\"" . $iedad . "\" readonly=\"\">
                </div><div class=\"form-group col-md-2\"><label for=\"inputSexo\">Sexo</label><input name=\"inputSexo\" class=\"form-control\" value=\"" . $isexo . "\" readonly=\"\">
                </div><div class=\"form-group col-md-2\"><label for=\"inputECivil\">Estado Civil</label><input type=\"text\" class=\"form-control\" name=\"inputECivil\" value=\"" . $yecivil . "\" readonly=\"\">
                </div></div><div class=\"form-row\"><div class=\"form-group col-md-3\"><label for=\"inputOcupacion\">Ocupación</label><input  type=\"text\" class=\"form-control\" name=\"inputOcupacion\" value=\"" . $iocupacion . "\" readonly=\"\">
                </div><div class=\"form-group col-md-3\"><label for=\"inputProfesion\">Profesión</label>
                <input  type=\"text\" class=\"form-control\" name=\"inputProfesion\" value=\"" . $iprofesion . "\" readonly=\"\">
                </div><div class=\"form-group col-md-3\"><label for=\"inputEscolaridad\">Escolaridad</label>
                <input  type=\"text\" class=\"form-control\" name=\"inputEscolaridad\" value=\"" . $iescolaridad . "\" readonly=\"\">
                </div> <div class=\"form-group col-md-3\"><label for=\"inputReferido\">Datos Referido por</label>
                <input type=\"text\" class=\"form-control\" name=\"inputReferido\" value=\"" . $ireferido . "\" readonly=\"\">
                </div></div><hr><div class=\"form-group\"><label for=\"inputDireccion\">Dirección</label>
                <input type=\"text\" class=\"form-control\" name=\"inputDireccion\" value=\"" . $idireccion . "\" readonly=\"\"></div>
                <div class=\"form-group\"><label for=\"inputAntecedentesL\">Antecedentes Legales</label>
                <input type=\"text\" class=\"form-control\" name=\"inputAntecedentesL\" value=\"" . $iantel . "\" readonly=\"\"></div><hr>";

        $sql2 = "SELECT * FROM historia where id=$ikey;";
        $resulta = mysqli_query($enlace, $sql2);
        if (mysqli_num_rows($resulta) > 0) {
            echo "<h2 align='center'>Historia Clinica</h2>";
            $i = 1;
            while ($row2 = mysqli_fetch_assoc($resulta)) {
                echo "<h5 align='center'>Consulta numero $i</h5>";
                echo "<div class=\"form-group\"><label for=\"inputMotivo\">Motivo de Consulta</label>
                        <textarea rows=\"3\" class=\"form-control\" name=\"inputMotivo\" readonly=\"\">" . $row2["motivo"] . "</textarea></div><div class=\"form-group\"><label for=\"inputDescripcion\">Descripcion del Paciente</label>
                        <textarea rows=\"3\" class=\"form-control\" name=\"inputDescripcion\" readonly=\"\">" . $row2["descrip"] . "</textarea></div><div class=\"form-group\"><label for=\"inputLenguaje\">Lenguaje</label>
                        <textarea rows=\"3\" class=\"form-control\" name=\"inputLenguaje\" readonly=\"\">" . $row2["lenguaje"] . "</textarea></div><div class=\"form-group\"><label for=\"inputPadecimiento\">Padecimiento Actual</label>
                        <textarea rows=\"3\" class=\"form-control\" name=\"inputPadecimiento\" readonly=\"\">" . $row2["padecimiento"] . "</textarea></div><div class=\"form-group\"><label for=\"inputAntecedentesP\">Antecedentes Personales no Patológicos</label>
                        <textarea rows=\"3\" class=\"form-control\" name=\"inputAntecendetesP\" readonly=\"\">" . $row2["antnopato"] . "</textarea></div><div class=\"form-group\"><label for=\"inputPatologias\">Antecedentes Heredofamiliares (Patologías)</label>
                        <textarea rows=\"3\" class=\"form-control\" name=\"inputPatologias\" readonly=\"\">" . $row2["antpato"] . "</textarea></div><div class=\"form-group\"><label for=\"inputDiagnostico\">Diagnóstico</label>
                        <textarea rows=\"3\" class=\"form-control\" name=\"inputDiagnostico\" readonly=\"\">v" . $row2["diagnostico"] . "</textarea></div><div class=\"form-group\"><label for=\"inputTratamiento\">Sugerencia de Tratamiento</label>
                        <textarea rows=\"3\" class=\"form-control\" name=\"inputTratamiento\" readonly=\"\">" . $row2["tratamiento"] . "</textarea></div>";
                $i = $i + 1;
            }
        } else {
            echo "<script>self.location= 'index.php?msg=aa03'</script>";
        }

        mysqli_close($enlace);
    } else {
        echo "<script>self.location= 'index.php?msg=aa02'</script>";
    }
}

//funcion de Editar datos

function editar($host, $user, $pass, $db, $name) {
    $sql = "SELECT * FROM datos WHERE nombre='$name';";
    $enlace = mysqli_connect($host, $user, $pass, $db) or die("Error al conectar con la base de datos");
    $result = mysqli_query($enlace, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $ikey = $row["id"];
        $iname = $row["nombre"];
        $iedad = $row["edad"];
        $isexo = $row["sexo"];
        $yecivil = $row["estcivil"];
        $ireferido = $row["referido"];
        $iocupacion = $row["ocupacion"];
        $iprofesion = $row["profesion"];
        $iescolaridad = $row["escolaridad"];
        $idireccion = $row["domicilio"];
        $iantel = $row["antecedentes"];

        echo "<div class=\"form-row\"><div class=\"form-group col-md-6\"><label for=\"inputNombre\">Nombre</label>
                <input type=\"text\" class=\"form-control\" name=\"inputNombre\" value=\"" . $iname . "\"></div>
                <div class=\"form-group col-md-2\"><label for=\"inputEdad\">Edad</label><input  type=\"number\" class=\"form-control\" name=\"inputEdad\" value=\"" . $iedad . "\" >
                </div><div class=\"form-group col-md-2\"><label for=\"inputSexo\">Sexo</label><input name=\"inputSexo\" class=\"form-control\" value=\"" . $isexo . "\" >
                </div><div class=\"form-group col-md-2\"><label for=\"inputECivil\">Estado Civil</label><input type=\"text\" class=\"form-control\" name=\"inputECivil\" value=\"" . $yecivil . "\" >
                </div></div><div class=\"form-row\"><div class=\"form-group col-md-3\"><label for=\"inputOcupacion\">Ocupación</label><input  type=\"text\" class=\"form-control\" name=\"inputOcupacion\" value=\"" . $iocupacion . "\" >
                </div><div class=\"form-group col-md-3\"><label for=\"inputProfesion\">Profesión</label>
                <input  type=\"text\" class=\"form-control\" name=\"inputProfesion\" value=\"" . $iprofesion . "\" >
                </div><div class=\"form-group col-md-3\"><label for=\"inputEscolaridad\">Escolaridad</label>
                <input  type=\"text\" class=\"form-control\" name=\"inputEscolaridad\" value=\"" . $iescolaridad . "\" >
                </div> <div class=\"form-group col-md-3\"><label for=\"inputReferido\">Datos Referido por</label>
                <input type=\"text\" class=\"form-control\" name=\"inputReferido\" value=\"" . $ireferido . "\" >
                </div></div><hr><div class=\"form-group\"><label for=\"inputDireccion\">Dirección</label>
                <input type=\"text\" class=\"form-control\" name=\"inputDireccion\" value=\"" . $idireccion . "\" ></div>
                <div class=\"form-group\"><label for=\"inputAntecedentesL\">Antecedentes Legales</label>
                <input type=\"text\" class=\"form-control\" name=\"inputAntecedentesL\" value=\"" . $iantel . "\" ></div><hr>
                <input id=\"numPac\" name=\"numPac\" type=\"hidden\" value=\"" . $ikey . "\">";

        mysqli_close($enlace);
    } else {
          echo "<script>self.location= 'index.php?msg=ef03'</script>";
    }
}

// Funcion de Actualizacion de Datos
function actualizar($host, $user, $pass, $db) {
    //Listado de Parametros 
    $iname = $_POST["inputNombre"];
    $iedad = $_POST["inputEdad"];
    $isexo = $_POST["inputSexo"];
    $yecivil = $_POST["inputECivil"];
    $ireferido = $_POST["inputReferido"];
    $iocupacion = $_POST["inputOcupacion"];
    $iprofesion = $_POST["inputProfesion"];
    $iescolaridad = $_POST["inputEscolaridad"];
    $idireccion = $_POST["inputDireccion"];
    $iantel = $_POST["inputAntecedentesL"];
    $ikey = $_POST["numPac"];
    $sql = "UPDATE datos set `nombre`='$iname', `edad`='$iedad', `sexo`='$isexo', `escolaridad`='$iescolaridad', `profesion`='$iprofesion', `ocupacion`='$iocupacion', `estcivil`='$yecivil', `domicilio`='$idireccion', `antecedentes`='$iantel', `referido`='$ireferido' WHERE  `id`=$ikey ";
    $enlace = mysqli_connect($host, $user, $pass, $db) or die("Error al conectar con la base de datos");
    $result = mysqli_query($enlace, $sql);
    if (!mysqli_query($enlace, $sql)) {
          echo "<script>self.location= 'index.php?msg=ef03'</script>";
    } else {
        mysqli_close($enlace);
        echo "<script>self.location= 'index.php?id=78857&msg=cc02&fun=nt56&&name=" . $iname . "'</script>";
    }
}

?>