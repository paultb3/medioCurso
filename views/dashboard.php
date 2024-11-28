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

    <iframe src=""></iframe>

    <script>
        // Obtener elementos del menú y el iframe
        const menuItems = document.querySelectorAll('#sidebar ul li a');
        const iframe = document.querySelector('iframe');

        // Función para manejar cambios en el iframe
        menuItems.forEach(item => {
            item.addEventListener('click', (e) => {
                if (item.classList.contains('logout')) {
                    return; // No aplicar la lógica de redirección para logout
                }

                e.preventDefault();
                const option = item.dataset.option;


                menuItems.forEach(i => i.classList.remove('active'));


                item.classList.add('active');

                switch (option) {
                    case 'inicio':
                        iframe.src = '<?php echo get_controllers("controladorInicio.php"); ?>'; // URL para la opción inicio
                        break;

                    case 'ver':
                        iframe.className = "iframe-ver";
                        iframe.src = '<?php echo get_controllers("controladorUsuario.php"); ?>';
                        break;
                    case 'ingresar':
                        iframe.className = "iframe-ingresar";
                        iframe.src = '<?php echo get_controllers("controladorIngresarUsuario.php"); ?>';
                        break;
                    case 'modificar':
                        iframe.className = "iframe-modificar";
                        iframe.src = '<?php echo get_controllers("controladorActualizarUsuario.php"); ?>';
                        break;
                    case 'eliminar':
                        iframe.className = "iframe-eliminar ";
                        iframe.src = '<?php echo get_controllers("controladorEliminarUsuario.php"); ?>';
                        break;
                }
            });
        });
    </script>
</body>

</html>