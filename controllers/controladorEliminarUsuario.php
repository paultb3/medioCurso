<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaEliminarUsuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modeloUsuario.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $tmpdatusername = $_POST["datusername"];


    $mensaje = '';
    if ($tmpdatusername) {

        $modeloUsuario = new modeloUsuario();

        try {
            $modeloUsuario->eliminarUsuarioPorNombre($tmpdatusername);
            $mensaje = "Usuario Eliminado con éxito";
        } catch (PDOException $e) {
            $mensaje = "Hubo un error ...<br>" . $e->getMessage();
        }
    }
    mostrarFormularioEliminar($mensaje);
} else {
    mostrarFormularioEliminar();
}
