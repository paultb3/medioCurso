<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaIngresarUsuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modeloUsuario.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $tmpdatusername = trim($_POST["datusername"]);
    $tmpdatpassword = trim($_POST["datpassword"]);
    $tmpdatperfil = trim($_POST["datperfil"]);

    // Validar campos vacíos
    if (empty($tmpdatusername) || empty($tmpdatpassword) || empty($tmpdatperfil)) {
        $mensaje = "Todos los campos son obligatorios. Por favor, rellene todos los campos.";
    } else {
        $modeloUsuario = new modeloUsuario();

        try {
            // Llamar al método insertarUsuario
            $resultado = $modeloUsuario->insertarUsuario($tmpdatusername, $tmpdatpassword, $tmpdatperfil);

            if ($resultado === "El usuario ya existe.") {
                $mensaje = "El usuario ya existe. Por favor, intente con un nombre de usuario diferente.";
            } else {
                $mensaje = "Usuario registrado con éxito.";
            }
        } catch (PDOException $e) {
            $mensaje = "Hubo un error ...<br>" . $e->getMessage();
        }
    }
}

mostrarFormularioIngreso($mensaje);
