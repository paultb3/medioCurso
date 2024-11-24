<?php
function mostrarFormularioIngreso($mensaje)
{
    if (empty($mensaje)) {
?>

        <form action="/controllers/controladorIngresarUsuario.php" method="POST">
            <label for="datusername">Usuario</label>
            <input type="text" name="datusername" id="datusername"><br>

            <label for="datpassword">Password</label>
            <input type="password" name="datpassword" id="datpassword"><br>

            <label for="datperfil">Perfil</label>
            <input type="text" name="datperfil" id="datperfil">

            <button type="submit">Registrar usuario</button>
        </form>

<?php
    } else {
        echo $mensaje;
    }
}
?>