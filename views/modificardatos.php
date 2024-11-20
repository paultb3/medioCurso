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
    $tmpdatusername = $_POST["datusername"];

    $conexion = new conexion($host, $namedb, $userdb, $passworddb);
    $pdo = $conexion->obtenerConexion();

    $query = $pdo->prepare("SELECT id, username, password, perfil FROM usuarios WHERE username = :username");
    $query->execute([':username' => $tmpdatusername]);
    $fila = $query->fetch(PDO::FETCH_ASSOC);

    if ($fila === false) {
        // Usuario no encontrado
        echo "<p style='color: red;'>El usuario '{$tmpdatusername}' no existe. Por favor, intenta nuevamente.</p>";
    } else {
        // Usuario encontrado, mostrar formulario para modificar
?>
        <form action="" method="POST">
            <input type="hidden" id="custId" name="custId" value="<?php echo $fila['id'] ?>">

            <label for="datusername">Usuario</label>
            <input type="text" name="datusername" id="datusername" value="<?php echo $fila['username'] ?>">

            <label for="datpassword">Password</label>
            <input type="password" name="datpassword" id="datpassword" value="<?php echo $fila['password'] ?>"><br>

            <label for="datperfil">Perfil</label>
            <input type="text" name="datperfil" id="datperfil" value="<?php echo $fila['perfil'] ?>">

            <button type="submit">Modificar usuario</button>
        </form>
<?php
        exit();
    }
}
?>

<form action="" method="POST">
    <label for="datusername">¿Qué usuario deseas modificar?</label>
    <input type="text" name="datusername" id="datusername">
    <br>
    <button type="submit">Modificar</button>
</form>