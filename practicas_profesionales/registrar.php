<?php
ob_start();
?>

<?php
session_start();
if (isset($_SESSION['ID'])) {

    #header("Location: center.php");
}

?>






<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registro/Register</title>
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
	<link rel="stylesheet" href="estilos2/estilos_registro.css">
	  <link rel="shortcut icon" type="image/x-icon" href="logo/favicon.jpg">

</head>
<body>
    <?php
#include 'Configuracion/config.php';
include 'conexion_bbdd/index.php';
?>
        <form class="formulario" method="post">
    <?php /*
if ($conex == false) {
echo("Error: Unable to connect");
?>
<h1 style="color:red;">Registrate</h1> <?php
//} else {
echo("Conexion Exitosa");?>
<h1 style="color: blue;">Registrate</h1><?php
//}     */?>
    <h1>Registrate</h1>
     <div class="contenedor">

<div class="input-contenedor">
    <i class="fas fa-user icon"></i>
    <input type="text" name="name_usuario"  placeholder="Nombre de Usuario" required>

    </div>

     <div class="input-contenedor">
         <i class="fas fa-user icon"></i>
         <input type="text" name="Primer_Nombre" placeholder="Nombre Completo" required>

         </div>

<div class="input-contenedor">
    <i class="fas fa-user icon"></i>
    <input type="text" name="Primer_Apellido"  placeholder="Apellido Completo" required>

    </div>


         <div class="input-contenedor">
         <i class="fas fa-envelope icon"></i>
         <input type="text" name="Email"  placeholder="Correo Electronico" required>

         </div>

         <div class="input-contenedor">
        <i class="fas fa-key icon"></i>
         <input type="password" name="password" id="contraseña" placeholder="Contraseña" required><img src="ver_y_ocultar/ocultar_icono.png" id="boton">

         </div>


<div class="input-contenedor">
    <i class="fas fa-user icon"></i>
    <input type="text" name="Celular"  placeholder="Celular" required>

    </div>
         <input type="submit"  name="registro" value="Registrarme" class="button">
         <p>Al registrarte, aceptas nuestras <a class="link" href="#">Condiciones de uso</a> y <a class="link" href="#">Política de privacidad</a>.</p>
         <p>¿Ya tienes una cuenta?<a class="link" href="index.php"> Iniciar Sesion</a> y mantente comunicado</p>
     </div>
    </form>

    <?php
#include 'Configuracion/config.php';
include 'Configuracion/config_register.php';
?>

</body>
</html>

<script>
    var boton = document.getElementById('boton');
    var input = document.getElementById('contraseña');

    boton.addEventListener('click', mostrarContraseña);

    function mostrarContraseña(){
        if (input.type == "password") {
            input.type = "text";
            boton.src = "ver_y_ocultar/ver_icono.png";

            setTimeout("ocultar()", 3000);
        } else {
            input.type = "password";
            boton.src = "ver_y_ocultar/ocultar_icono.png";
        }
        function ocultar(){
            input.type = "password";
            boton.src = "ver_y_ocultar/ocultar_icono.png";
        }
    }


</script>


<style>
    #boton{
        cursor: pointer;
        /*width: 30px;*/
    }
</style>

<?php
ob_end_flush();
?>