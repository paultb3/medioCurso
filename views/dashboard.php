<?php
    session_start();

    if(!isset($_SESSION["txtusername"])){
        header('Location: http://127.0.0.1/mediocurso/index.php');
    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupo tarazona</title>
    <link rel="stylesheet" href="./CSS/dashboard.css">
</head>
<body>
    <header >
        <h3 class="titulo">Grupo Tarazona</h3>
        <ul>
            <li><a href="?option=inicio">ingresar</a></li>
            <li><a href="?option=ver">ver</a></li>
            <li><a href="?option=modificar">modificar</a></li>
            <li><a href="?option=eliminar">eliminar</a></li>
            <li><a href="http://127.0.0.1/mediocurso/controllers/logout.php">salir</a></li>
        </ul>
    </header>
    <div>
        <?php

            if(isset($_GET["option"])){
                $opcion = $_GET["option"];

                echo $opcion;
                echo "se esta ejecutando";
            }
        ?>
    </div>

</body>
</html>