<?php

function mostrarErrorLogin()
{
    ob_start();
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Error de login</title>
        <link rel="stylesheet" href="<?php echo get_UrlBase('views/css/error.css'); ?>?v=<?php echo time(); ?>">
    </head>

    <body>
        <div class="container ">
            <h1>Clave incorrecta, vuelva a ingresar !</h1>
            <a href="<?php echo get_UrlBase('index.php'); ?>">Volver</a>
        </div>
    </body>

    </html>

<?php
    return ob_get_clean();
}
?>