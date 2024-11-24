<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaIngresarUsuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modeloUsuario.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
}



$modeloUsuario = new modeloUsuario();

$usuarios = $modeloUsuario->obtenerUsuario();

mostrarUsuario($usuarios);
