<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link
    rel="stylesheet"
    href="<?php echo get_UrlBase('views/css/styles.css') ?>" />
  <link
    href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
    rel="stylesheet" />
</head>

<body>
  <?php
  session_start();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $v_username = "";
    $v_password = "";

    if (isset($_POST["txtusername"])) {
      $v_username = $_POST["txtusername"];
    }

    if (isset($_POST["txtpassword"])) {
      $v_password = $_POST["txtpassword"];
    }

    if (($v_username == "admin") && ($v_password == "1234")) {
      $_SESSION["txtusername"] = $v_username;
      $_SESSION["txtpassword"] = $v_password;
      header('Location: ' . get_views('dashboard.php'));
      //echo "dashboard";
    } else {
      header('Location:' . get_views('claveequivocada.php'));
      //echo "aaaa";
    }
  }

  if (isset($_SESSION["txtusername"])) {
    header('Location:' . get_views('dashboard.php'));
  }

  ?>

  <div class="wrapper">
    <form action="" method="POST" autocomplete="off">
      <h1>login</h1>
      <div class="input-box">
        <input
          type="text"
          placeholder="ingrese el nombre del usuario"
          name="txtusername"
          id="txtusername"
          autocomplete="new-username" />
        <i class="bx bxs-user"></i>
      </div>
      <div class="input-box">
        <input
          type="password"
          placeholder="ingrese su contraseña"
          name="txtpassword"
          id="txtpassword"
          autocomplete="new-password" />
        <i class="bx bxs-lock-alt"></i>
      </div>

      <button type="submit" class="btn">Login</button>

      <div class="register-link">
        <p>
          No tienes una cuenta?
          <a href="#">Registrate</a>
        </p>
      </div>
    </form>
  </div>
</body>

</html>