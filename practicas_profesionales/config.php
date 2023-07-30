<?php
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "baul_select"; /* Database name */
$con = mysqli_connect($host, $user, $password,$dbname);
// Revisamos la conexión
if (!$con) {
die("Connection failed: " . mysqli_connect_error());
} else {
    echo ("Exito");
}