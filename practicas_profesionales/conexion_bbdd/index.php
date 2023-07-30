<?php
$conex = mysqli_connect("localhost", "root", "", "practicas_profesionales_unan");
/*$conex = mysqli_connect("localhost", "root", "", "bbdd_incostas_nouel");*/

if ($conex == false) {
    echo ("Error: Unable to connect");
} else {
    //echo("Conexion Exitosa");
}
