<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaActualizarUsuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modeloUsuario.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
}


$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modeloUsuario = new modeloUsuario();

    if (isset($_POST['custId'])) { //envio desde formulario editar

        $tmpcustID = $_POST["custId"];
        $tmpdatusername = $_POST["datusername"];
        $tmpdatpassword = $_POST["datpassword"];
        $tmpdatperfil = $_POST["datperfil"];
        $modeloUsuario->actualizarUsuario($tmpcustID, $tmpdatusername, $tmpdatpassword, $tmpdatperfil);
        echo "Actualizacion con exito";
    } else { //envia de formulariop buscar

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
