<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link
        rel="stylesheet"
        href="<?php echo get_UrlBase('views/css/styles.css') ?>?v=<?php echo time(); ?>" />
    <link
        href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
        rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <form action="/controllers/controladorLogin.php" method="POST" id="login-form">
            <h1>login</h1>
            <div class="input-box">
                <input
                    type="text"
                    placeholder="ingrese el nombre del usuario"
                    name="txtusername"
                    id="txtusername"
                    autocomplete="off" />
                <i class="bx bxs-user"></i>
            </div>
            <div class="input-box">
                <input
                    type="password"
                    placeholder="ingrese su contraseña"
                    name="txtpassword"
                    id="txtpassword"
                    autocomplete="off" />
                <i class="bx bxs-lock-alt"></i>
            </div>

            <button type="submit" class="btn" id="submit-login">Login</button>

            <div class="register-link">
                <p>
                    No tienes una cuenta?
                    <a href="#">Registrate</a>
                </p>
            </div>
        </form>
    </div>

    <div id="output">  Bienvenido, espero que tengas un buen día</div>

    <script src="../views/js/controladorLogin.js"></script>
</body>

</html>