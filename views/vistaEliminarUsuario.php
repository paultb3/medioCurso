<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';


function mostrarFormularioEliminar($mensaje = '')
{

    if (!empty($mensaje)) {
        echo $mensaje;
    } else {
?>


        <form class="form-eliminar" action="/controllers/controladorEliminarUsuario.php" method="POST">
            <label for="datusername">A quien debo eliminar?</label>
            <input autocomplete="off" type="text" name="datusername" id="datusername" autocomplete="off">
            <br>
            <button type="submit" class="btn-eliminar">Eliminar usuario</button>

        </form>

<?php
    }
}

?>

<head>
    <link rel="stylesheet" href="<?php echo get_UrlBase('views/css/formulario.css') ?>?v=<?php echo time(); ?>">
</head>