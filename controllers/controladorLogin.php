<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modeloUsuario.php';

// Si el usuario ya tiene sesión iniciada, lo redirigimos al dashboard
if (isset($_SESSION["txtusername"])) {
    header('Location: ' . get_controllers('controladorDashboard.php'));
    exit();
} else {
    // Si el método de la solicitud es POST, validamos las credenciales
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $v_username = "";
        $v_password = "";

        if (isset($_POST["txtusername"])) {
            $v_username = $_POST["txtusername"];
        }

        if (isset($_POST["txtpassword"])) {
            $v_password = $_POST["txtpassword"];
        }

        $modeloUsuario = new modeloUsuario();
        $credenciales = $modeloUsuario->validarUsuario($v_username, $v_password);

        // Si las credenciales son correctas, iniciamos sesión y redirigimos al dashboard
        if ($credenciales) {
            if ($credenciales) {
                $_SESSION["txtusername"] = $v_username;
                $_SESSION["txtpassword"] = $v_password;
                echo json_encode(['success' => true]); // Respuesta exitosa
                exit();
            } else {
                echo json_encode(['success' => false, 'message' => 'Credenciales incorrectas.']); // Respuesta con error
                exit();
            }

            // Si es una petición AJAX, devolvemos JSON; si no, redirigimos
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
                echo json_encode(['success' => true]);
            } else {
                header('Location: ' . get_controllers('controladorDashboard.php'));
                exit();
            }
        } else {
            // Si las credenciales son incorrectas
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
                echo json_encode(['success' => false, 'message' => 'Usuario o contraseña incorrectos.']);
            } else {
                header('Location:' . get_controllers('controladorClaveEquivocada.php'));
                exit();
            }
        }
    }

    // Si no es una solicitud POST, se carga el formulario de login
    include get_views_disk('vistaLogin.php');
}
