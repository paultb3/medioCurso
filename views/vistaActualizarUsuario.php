<?php
function mostrarFormularioBusqueda($mensaje)
{
    if (!empty($mensaje)) {
        echo $mensaje;
    }
?>

    <head>
        <link rel="stylesheet" href="<?php echo get_UrlBase('views/css/formulario.css') ?>?v=<?php echo time(); ?>">
    </head>
    <form class="form-buscar" action="/controllers/controladorActualizarUsuario.php" method="POST">
        <label for="">que usuario deseas modificar?</label>
        <input autocomplete="off" type="text" name="datusername" id="datusername">
        <br>
        <button class="btn-buscar" type="submit">Buscar usuario</button>
    </form>

<?php

}

function mostrarFormularioEdicion($usuario, $mensaje = '')
{
?>

    <head>
        <link rel="stylesheet" href="<?php echo get_UrlBase('views/css/formulario.css') ?>?v=<?php echo time(); ?>">
    </head>
    <form class="form-actualizar" action="/controllers/controladorActualizarUsuario.php" method="POST">
        <input autocomplete="off" type="hidden" id="custId" name="custId" value="<?php echo $usuario['id'] ?>">
        <label for="datusername">Usuario</label>
        <input autocomplete="off" type="text" name="datusername" id="datusername" value="<?php echo $usuario['username'] ?>">
        <label for="datpassword">Password</label>
        <input autocomplete="off" type="password" name="datpassword" id="datpassword" value="<?php echo $usuario['password'] ?>"><br>
        <label for="datperfil">Perfil</label>
        <input autocomplete="off" type="text" name="datperfil" id="datperfil" value="<?php echo $usuario['perfil'] ?>">
        <button type="submit">Modificar usuario</button>
    </form>
<?php
}

?>