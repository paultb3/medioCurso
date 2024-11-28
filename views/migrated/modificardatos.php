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

    if (isset($_POST["custId"])) {
        try {
            $sentencia = $pdo->prepare("update usuarios set username=?, password=?, perfil=? where id =?;");
            $sentencia->execute([$_POST["datusername"], $_POST["datpassword"], $_POST["datperfil"], $_POST["custId"]]);
            echo $tmpdatusername . " modificacion con exito <br>";
        } catch (PDOException $e) {
            echo "Hubo un error al modificar....<br>";
            echo $e->getMessage();
        }
    } else {

        $query = $pdo->query("select id,username,password,perfil from usuarios where username='" . $tmpdatusername . "'");
        $fila = $query->fetch(PDO::FETCH_ASSOC);
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
    }
    exit();
}
?>
<form action="" method="POST">
    <label for="datusername">que usuario deseas modificar?</label>
    <input type="text" name="datusername" id="datusername">
    <br>
    <button type="submit">buscar usuario</button>
</form>