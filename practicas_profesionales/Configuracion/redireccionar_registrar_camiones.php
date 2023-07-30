
<?php
session_start();
if (!isset($_SESSION['ID_USER'])) {
    echo ("No se ha logeado");
    header("Location: ../registrar_camion.php");
} else {
    header("Location: ../registrar_camion.php");
    //echo ("Logeado");
    //echo ($_SESSION['ID_USER']);
    //echo ($_SESSION['name_user']);
}

?>