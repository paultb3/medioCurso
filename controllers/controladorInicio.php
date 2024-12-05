<?php
// controladorInicio.php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
    exit;
}

// Cargar dependencias necesarias
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaInicio.php';

// Renderizar la vista de inicio
mostrarFormularioInicio();
