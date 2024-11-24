<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/vistaIngresarUsuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modeloUsuario.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Asignar los valores de los inputs
    $tmpdatusername = $_POST["datusername"];
    $tmpdatpassword = $_POST["datpassword"];
    $tmpdatperfil = $_POST["datperfil"];

    $modeloUsuario = new modeloUsuario();

    try {
        $modeloUsuario->insertarUsuario($tmpdatusername, $tmpdatpassword, $tmpdatperfil);
        $mensaje = "usuario registrado con exito";
    } catch (PDOException $e) {
        $mensaje = "Hubo un error ...<br>" . $e->getMessage();
    }

    exit();
}

mostrarFormularioIngreso($mensaje);
