<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';

function mostrarUsuario($usuarios)
{

?>

    <table class="tabla" border="1 ">
        <tr>
            <th>id</th>
            <th>username</th>
            <th>password</th>
            <th>perfil</th>
            <th>eliminar</th>
            <th>editar</th>
        </tr>
        <?php
        foreach ($usuarios as $usuario) {
        ?>
            <tr>
                <td><?php echo $usuario['id'] ?></td>
                <td><?php echo $usuario['username'] ?></td>
                <td><?php echo $usuario['password'] ?></td>
                <td><?php echo $usuario['perfil'] ?></td>
                <td><a class="btn eliminar" href="<?php echo get_controllers('controladorEliminarUsuario.php?username=' . $usuario['username']); ?>">Eliminar</a></td>
                <td><a class="btn editar" href="<?php echo get_controllers('controladorActualizarUsuario.php?username=' . $usuario['username']); ?>">Editar</a></td>

            </tr>
        <?php
        }
        ?>
    </table>
<?php
}
?>

<head>
    <link rel="stylesheet" href="<?php echo get_UrlBase('views/css/verdatos.css') ?>?v=<?php echo time(); ?>">
</head>