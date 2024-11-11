<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="./views/css/styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <?php
        session_start();

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $v_username = "";
            $v_password = "";

            if (isset($_POST["txtusername"])){
                $v_username = $_POST["txtusername"];
            }

            if (isset($_POST["txtpassword"])){
                $v_password = $_POST["txtpassword"];
            }

            if(($v_username == "admin")&&($v_password == "12345")){
                header('Location: http://127.0.0.1/mediocurso/views/dashboard.php');
                $_SESSION["txtusername"] = $v_username;
                $_SESSION["txtpassword"] = $v_password;
               //echo "dashboard";
            }else{
                header('Location: http://127.0.0.1/mediocurso/controllers/claveequivocada.php');
              //echo "aaaa";
            }

        }

        if(isset($_SESSION["txtusername"])){
            header('Location: http://127.0.0.1/mediocurso/views/dashboard.php');
        }

    ?>

    <div class="container">
      <h3 class="titulo">LOGIN</h3>

      <form action="" method="POST" autocomplete="off">
        <div class="inputs">
          <label for="">Username</label>
          <input
            type="text"
            name="txtusername"
            id="txtusername"
            autocomplete="new-username"
          />
          <br />

          <label for="">Password</label>
          <input
            type="password"
            name="txtpassword"
            id="txtpassword"
            autocomplete="new-password"
          /><br />
        </div>

        <input class="boton" type="submit" value="LOGIN" />
      </form>
      <div class="registrar">
        <a href="#">Registrarse</a>
      </div>
    </div>
  </body>
</html>
