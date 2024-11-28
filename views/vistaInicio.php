<?php
// vistaInicio.php

// Cargar configuración
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';

// Función para mostrar el formulario
function mostrarFormularioInicio()
{
    ob_start(); // Inicia el buffer de salida
?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bienvenido - Sistema</title>
        <link rel="stylesheet" href="<?php echo get_UrlBase('views/css/inicio.css'); ?>?v=<?php echo time(); ?>">
    </head>

    <body>
        <div class="wrapper">
            <h1>Bienvenido al Sistema</h1>
            <p>Estamos encantados de tenerte aquí. Explora las opciones del menú ubicadas al lado izquierdo. 😊</p>


        </div>
    </body>

    </html>

<?php
    return ob_get_clean(); // Devuelve el contenido generado
}

// Renderiza la vista
echo mostrarFormularioInicio();
