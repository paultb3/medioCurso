<?php

session_start();

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/conexion.php';


$conexion = new conexion($host, $namedb, $userdb, $passworddb);
$pdo = $conexion->obtenerConexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validar que los campos no estén vacíos
    if (empty($_POST["datusername"])) {
        echo "Error: Todos los campos (usuario, contraseña y perfil) son obligatorios.<br>";
    } else {

        $tmpdatusername = $_POST["datusername"];

        $conexion = new conexion($host, $namedb, $userdb, $passworddb);
        $pdo = $conexion->obtenerConexion();

        try {
            $sentencia = $pdo->prepare("delete from usuarios where username=?;");
            $sentencia->execute([$tmpdatusername]);
            echo $tmpdatusername . " Fue eliminado con exito";
        } catch (PDOException $e) {
            echo "Hubo un error no se pudo eliminar....<br>";
            echo $e->getMessage();
        }
    }
    exit();
}

?>
<form action="" method="POST">
    <label for="datusername">A quien debo eliminar?</label>
    <input type="text" name="datusername" id="datusername">
    <br>
    <button type="submit">Eliminar usuario</button>

</form>