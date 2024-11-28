<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/conexion.php';

session_start();
?>
<!DOCTYPE html>
<html>

<body>

    <?php

    session_unset();
    session_destroy();

    header('Location: ' . get_UrlBase('index.php'));

    ?>

</body>

</html>