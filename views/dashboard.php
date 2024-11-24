<?php

session_start();

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="<?php echo get_UrlBase('views/css/dashboard.css') ?>?v=<?php echo time(); ?>">

</head>

<body>
    <nav id="sidebar">
        <ul>
            <li><a href="#" class="logo">
                    <img src="../views/img/icono7.jpg" alt="icono de la empresa">
                    <span class="nav-item">company</span>
                </a></li>

            <li><a href="?option=inicio"><i>
                        <i class="fas fa-home nav-item"></i>
                        <span class="nav-item">Inicio</span>
                </a></li>
            <li><a href="?option=ver">
                    <i class="fas fa-eye nav-item"></i>
                    <span class="nav-item">ver</span>
                </a></li>
            <li><a href="?option=ingresar">
                    <i class="fas fa-plus-circle nav-item"></i>
                    <span class="nav-item">ingresar</span>
                </a>
            </li>
            <li><a href="?option=modificar">
                    <i class="fas fa-edit nav-item"></i>
                    <span class="nav-item">modificar</span>
                </a></li>
            <li><a href="?option=eliminar">
                    <i class="fas fa-trash nav-item"></i>
                    <span class="nav-item">eliminar</span>
                </a></li>
            <li><a href="<?php echo get_controllers('logout.php') ?> " class="logout">
                    <i class="fas fa-sign-out-alt nav-item"></i>
                    <span class="nav-item">salir</span>
                </a></li>
        </ul>
    </nav>

    <div>
        <?php
        if (isset($_GET["option"])) {
            $opcion = $_GET["option"];
            switch ($opcion) {
                case 'inicio':
                    echo "<h1>Bienvenidos al sistema</h1>";
                    break;
                case 'ver':
                    echo "<iframe class='iframe-ver' src='" . get_controllers("controladorUsuario.php") . "'></iframe>";
                    break;
                case 'ingresar':
                    echo "<iframe class='iframe-ingresar' src='" . get_views("ingresardatos.php") . "'></iframe>";
                    break;
                case 'modificar':
                    echo "<iframe class='iframe-modificar' src='" . get_views("modificardatos.php") . "'></iframe>";
                    break;
                case 'eliminar':
                    echo "<iframe class='iframe-eliminar' src='" . get_views("eliminardatos.php") . "'></iframe>";
                    break;
            }
        }
        ?>
    </div>
</body>

</html>

<!--<span><i class='bx bx-menu'></i></span>
        <ul>
            <li><a href="?option=inicio"> Inicio</a></li>
            <li><a href="?option=ver">ver</a></li>
            <li><a href="?option=ingresar">ingresar</a></li>
            <li><a href="?option=modificar">modificar</a></li>
            <li><a href="?option=eliminar">eliminar</a></li>
            <li><a href="<?php echo get_controllers('logout.php') ?>">salir</a></li>
        </ul>-->