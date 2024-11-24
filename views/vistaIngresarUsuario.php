<?php
function mostrarUsuario($usuarios)
{

?>

    <table class="tabla" border="1 ">
        <tr>
            <th>id</th>
            <th>username</th>
            <th>password</th>
            <th>perfil</th>
        </tr>
        <?php
        foreach ($usuarios as $usuario) {
        ?>
            <tr>
                <td><?php echo $usuario['id'] ?></td>
                <td><?php echo $usuario['username'] ?></td>
                <td><?php echo $usuario['password'] ?></td>
                <td><?php echo $usuario['perfil'] ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
<?php
}
?>

<head>
    <link rel="stylesheet" href="../views/css/verdatos.css">
</head>