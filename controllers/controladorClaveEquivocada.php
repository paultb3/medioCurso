<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaClaveEquivocada.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

echo mostrarErrorLogin();
