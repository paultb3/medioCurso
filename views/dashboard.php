<?php

session_start();

if (!isset($_SESSION["txtusername"])) {
    header('Location: '.get_UrlBase('index.php'));
}


require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/conexion.php';


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupo tarazona</title>
    <link rel="stylesheet" href="<?php echo get_UrlBase('views/css/dashboard.css') ?>">
</head>

<body>
    <header>
        <h3 class="titulo">Grupo Tarazona</h3>
        <ul>
            <li><a href="?option=inicio"> Inicio</a></li>
            <li><a href="?option=ver">ver</a></li>
            <li><a href="?option=ingresar">ingresar</a></li>
            <li><a href="?option=modificar">modificar</a></li>
            <li><a href="?option=eliminar">eliminar</a></li>
            <li><a href="<?php echo get_controllers('logout.php') ?>">salir</a></li>
        </ul>
    </header>
    <div>
        <?php

        if (isset($_GET["option"])) {
            $opcion = $_GET["option"];

            switch ($opcion){
                case 'inicio':
                    echo "<h1>Bienvenidos al sistema</h1>";
                    break;
                case 'ver':
                    echo "<iframe src='".get_views("verdatos.php")."'></iframe>";
                    break;
                case 'ingresar':
                     echo "<iframe src='".get_views("ingresardatos.php")."'></iframe>";
                    break;
                case 'modificar':
                    echo "<iframe src='".get_views("modificardatos.php")."'></iframe>";
                    break;
                case 'eliminar':
                    echo "<iframe src='".get_views("eliminardatos.php")."'></iframe>";
                    break;
            }
           
        }
        ?>
    </div>

</body>

</html>