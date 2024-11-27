<?php

session_start();

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/conexion.php';


$conexion = new conexion($host, $namedb, $userdb, $passworddb);


$pdo = $conexion->obtenerConexion();

$query = $pdo->query("select id,username,password,perfil from usuarios");

?>
<h2>Lista de usurios del sistema</h2>

<table border="1 " >
    <tr>
        <th>id</th>
        <th>username</th>
        <th>password</th>
        <th>perfil</th>
    </tr>
    <?php 
    while($fila= $query->fetch(PDO::FETCH_ASSOC))
    {
    ?>
    <tr>
        <td><?php echo $fila['id'] ?></td>
        <td><?php echo $fila['username'] ?></td>
        <td><?php echo $fila['password'] ?></td>
        <td><?php echo $fila['perfil'] ?></td>
    </tr>
    <?php
    }
     ?>

</table>