<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/conexion.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error de login</title>
    <link rel="stylesheet" href="../views/css/error.css">
</head>

<body>
    <div class="container">
        <h1>Clave incorrecta, vuelva a ingresar !</h1>
        <a href="<?php echo get_UrlBase('index.php') ?>">volver</a>
    </div>

</body>

</html>