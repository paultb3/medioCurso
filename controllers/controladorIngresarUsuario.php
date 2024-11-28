<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaIngresarUsuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modeloUsuario.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Asignar los valores de los inputs
    $tmpdatusername = trim($_POST["datusername"]);
    $tmpdatpassword = trim($_POST["datpassword"]);
    $tmpdatperfil = trim($_POST["datperfil"]);

    // Validar campos vacíos
    if (empty($tmpdatusername) || empty($tmpdatpassword) || empty($tmpdatperfil)) {
        $mensaje = "Todos los campos son obligatorios. Por favor, rellene todos los campos.";
    } else {
        $modeloUsuario = new modeloUsuario();

        try {
            $modeloUsuario->insertarUsuario($tmpdatusername, $tmpdatpassword, $tmpdatperfil);
            $mensaje = "Usuario registrado con éxito";
        } catch (PDOException $e) {
            $mensaje = "Hubo un error ...<br>" . $e->getMessage();
        }
    }
}

mostrarFormularioIngreso($mensaje);
