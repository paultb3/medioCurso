<?php

session_start();

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Asignar los valores de los inputs
    $tmpdatusername = $_POST["datusername"];
    $tmpdatpassword = $_POST["datpassword"];
    $tmpdatperfil = $_POST["datperfil"];

    // Crear conexión y continuar
    $conexion = new Conexion(DB_HOST, DB_NAME, DB_USER, DB_PASS);
    $pdo = $conexion->obtenerConexion();

    try {
        $sentencia = $pdo->prepare("INSERT INTO usuarios (username, password, perfil) VALUES (?,?,?);");
        $sentencia->execute([$tmpdatusername, $tmpdatpassword, $tmpdatperfil]);
        echo "usuario registrado <br>";
    } catch (PDOException $e) {
        echo "Hubo un error....<br>";
        echo $e->getMessage();
    }

    exit();
}
?>

<head>
    <link rel="stylesheet" href="../views/css/ingresardatos.css">
</head>


<body>
    <form action="" method="POST">
        <label for="datsername">Usuario</label>
        <input type="text" name="datusername" id="datusername">

        <label for="datpassword">Password</label>
        <input type="password" name="datpassword" id="datpassword">

        <label for="datperfil">Perfil</label>
        <input type="text" name="datperfil" id="datperfil">

        <button type="submit">Registrar usuario</button>

    </form>
</body>