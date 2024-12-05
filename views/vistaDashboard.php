<?php
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
            <li><a href="#" class="logo" data-option="inicio">
                    <img src="../views/img/icono7.jpg" alt="icono de la empresa">
                    <span class="nav-item">company</span>
                </a></li>

            <li><a href="?option=inicio" data-option="inicio">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Inicio</span>
                </a></li>
            <li><a href="?option=ver" data-option="ver">
                    <i class="fas fa-eye"></i>
                    <span class="nav-item">Ver</span>
                </a></li>
            <li><a href="?option=ingresar" data-option="ingresar">
                    <i class="fas fa-plus-circle"></i>
                    <span class="nav-item">Ingresar</span>
                </a>
            </li>
            <li><a href="?option=modificar" data-option="modificar">
                    <i class="fas fa-edit"></i>
                    <span class="nav-item">Modificar</span>
                </a></li>
            <li><a href="?option=eliminar" data-option="eliminar">
                    <i class="fas fa-trash"></i>
                    <span class="nav-item">Eliminar</span>
                </a></li>
            <li><a href="<?php echo get_controllers('logout.php') ?>" class="logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-item">Salir</span>
                </a></li>
        </ul>
    </nav>


    <div class="contenido">
        <?php
        if (isset($contenido)) {
            echo $contenido;
        } else {
            echo "<h1> Bienvenido al sistema</h1>";
        }
        ?>
    </div>
</body>

</html>