<?php
ob_start();
?>


<?php
session_start();
if (!isset($_SESSION['ID_USER'])) {
    //echo ("No se ha logeado");
    //header("Location: registrar.php");
} else {
    header("Location: center.php");
    echo ("Logeado");
    echo ($_SESSION['ID_USER']);
    echo ($_SESSION['name_user']);
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Iniciar Sesion</title>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="shortcut icon" type="image/x-icon" href="logo/favicon.jpg">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
  <link rel="stylesheet" type="text/css" href="estilos2/estilos_login.css">
</head>


<body>
<?php
include 'conexion_bbdd/index.php';
#include 'Configuracion/config_login.php';
?>
    <form method="post" action="" class="formulario">

    <h1>Iniciar Sesion</h1>
     <div class="contenedor">



         <div class="input-contenedor">
         <i class="fas fa-envelope icon"></i>
         <input type="text" placeholder="Nombre de Usuario"  name="Email" required>

         </div>

         <div class="input-contenedor">
        <i class="fas fa-key icon"></i>
         <input type="password" name="password" id="contraseña" placeholder="Contraseña" required><img src="ver_y_ocultar/ocultar_icono.png" id="boton">

         </div>
         <input type="submit" name="Login" value="Iniciar Sesion" class="button">
         <p>Al registrarte, aceptas nuestras <a class="link" href="#">Condiciones de uso </a> y <a class="link" href="#">Política de privacidad </a>.</p>
         <p>¿No tienes una cuenta? <a class="link" href="./registrar.php">Registrate </a> es gratis</p>
     </div>
    </form>


<?php
include 'Configuracion/config_login.php';
?>

</body>
</html>
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
