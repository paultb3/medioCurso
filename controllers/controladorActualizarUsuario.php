<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaActualizarUsuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modeloUsuario.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modeloUsuario = new modeloUsuario();

    if (isset($_POST['custId'])) {

        $tmpcustID = $_POST["custId"];
        $tmpdatusername = $_POST["datusername"];
        $tmpdatpassword = $_POST["datpassword"];
        $tmpdatperfil = $_POST["datperfil"];
        $modeloUsuario->actualizarUsuario($tmpcustID, $tmpdatusername, $tmpdatpassword, $tmpdatperfil);
        echo "Actualizacion con exito";
    } else {

        $tmpdatusername = $_POST["datusername"];
        $usuario = $modeloUsuario->obtenerUsuarioPorNombre($tmpdatusername);
        if ($usuario) {
            mostrarFormularioEdicion($usuario);
        } else {
            mostrarFormularioBusqueda("Usuario no encontrado...");
        }
    }
} else {
    mostrarFormularioBusqueda($mensaje);
}
