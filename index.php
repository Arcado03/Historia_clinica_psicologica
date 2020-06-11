<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Historia Clinica V102</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link  rel="icon"   href="img/logo.ico" type="img/ico" />
    </head>
    <body> 
        <nav class="navbar navbar-light justify-content-between" style="background-color:#e3f2fd;">
            <a class="navbar-brand" href="index.php">
                <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                Historia Clinica
            </a>
            <form class="form-inline" method="POST" action="index.php">
                <input class="form-control mr-sm-2" type="Search" placeholder="Buscar" aria-label="Buscar">
                <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </nav>
        <?php
        include "php/mensajes.php";
        
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($id == 78856) {
                include 'php/nuevo.php';
            }
            if ($id == 78857) {
                if (isset($_GET['name'])) {
                    $name = $_GET['name'];
                    include "php/historia.php";
                }
            }
            if ($id == 78858) {
                if (isset($_GET['name'])) {
                    $name = $_GET['name'];
                    include "php/editar.php";
                }
            }
        } else {
            include "php/lista.php";
        }
        ?>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <br><br><br><br><br><br><br>
    </body>
    <footer class="font-small mt-5" style="background-color: #002752;position: fixed; bottom: 0px; width: 100%; height: 50px">
        <div class="text-white text-center py-3">© 2020 Contacto con Desarrollador:
            <a class="text-info" href="#"> Aquí</a>
        </div>
    </footer>
</html>