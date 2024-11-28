<?php
function mostrarFormularioIngreso($mensaje)
{
    if (empty($mensaje)) {
?>

        <head>
            <link rel="stylesheet" href="<?php echo get_UrlBase('views/css/formulario.css') ?>?v=<?php echo time(); ?>">
        </head>
        <form class="form-ingresar" action="/controllers/controladorIngresarUsuario.php" method="POST">
            <label for="datusername">Usuario</label>
            <input autocomplete="off" type="text" name="datusername" id="datusername" required><br>

            <label for="datpassword">Password</label>
            <input autocomplete="off" type="password" name="datpassword" id="datpassword" required><br>

            <label for="datperfil">Perfil</label>
            <input autocomplete="off" type="text" name="datperfil" id="datperfil" required>

            <button type="submit" class="btn-registrar">Registrar usuario</button>
        </form>

<?php
    } else {
        echo $mensaje;
    }
}
?>