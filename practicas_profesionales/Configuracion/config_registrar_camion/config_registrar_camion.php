<?php
ob_start();
?>


<!DOCTYPE html>
<html>
<head>
	  <link rel="stylesheet" type="text/css" href="estilos2/estilos_registro.css">
	<title></title>
</head>
<body>


<?php

include './conexion_bbdd/index.php';

if (isset($_POST['btn_registrar_camion'])) {
//recibir los datos y almacenar variables
    #$Fecha_Reg = date("d/m/y");
    $name_usuario = trim($_POST['name_usuario']);
    $Primer_Nombre = trim($_POST['Primer_Nombre']);
    // $Segundo_Nombre = trim($_POST['Segundo_Nombre']);
    $Primer_Apellido = trim($_POST['Primer_Apellido']);
    // $Segundo_Apellido = trim($_POST['Segundo_Apellido']);        #'$Fecha_Reg'
    $Email = trim($_POST['Email']);
    $password = trim(md5($_POST['password']));
    $Celular = trim($_POST['Celular']);
//aleatorio
    $aleatorio = uniqid();
//consulta para insertar
    //$insertar="INSERT INTO usuario_corinto (Fecha_Reg, Nombre,Apellido ,name_user , password, code) VALUES (now(), '$Primer_Nombre','$Primer_Apellido' ,'$Email' , '$password','$aleatorio')";

    $insertar = "INSERT INTO usuario_corinto (Fecha_Reg , code, name_user, Nombre, Apellido,
		Email , password,Telefono)
		VALUES (now(),'$aleatorio', '$name_usuario', '$Primer_Nombre', '$Primer_Apellido', '$Email', '$password', '$Celular')";

    $verificar_Email = mysqli_query($conex, "SELECT *  FROM usuario_corinto WHERE Email='$Email' or name_user='$name_usuario'  ");

    if (mysqli_num_rows($verificar_Email) > 0) {

        ?>
	<h1 class="h1">Este usuario ya esta registrado</h1>
	<?php
header("Refresh:5; URL=registrar.php");
    }
//Ejecutar consulta
    else {
        $resultado = mysqli_query($conex, $insertar);

        if (!$resultado) {
            ?>
	    	<h1 class="h1"> Error al registrar</h1>
	    	<?php
header("Refresh:5; URL=registrar.php");
        } else {
            ?>


	 <h1 class="h1">¡Felicidades, se ha registrado exitosamente! <a href="index.php">Inicia sesion</a> </h1>

	 <?php #inicia la verificacion del registro ?>
	    <?php
#Debes editar las proximas dos lineas de acuerdo con tus preferencias
            $email_to = $Email;
            $email_subject = "Confirma tu email Photogram";
            $email_from = "reply.tusitioweb.com";

            $email_message = "Hola " . $Primer_Nombre . ", para poder disfrutar de nuestro sitio web, debes confirmar tu email\n\n";
            $email_message = "Ingresa el siguiente codigo para confirmar tu email\n\n";
            $email_message .= "Codigo: " . $aleatorio . "\n";

            // Ahora se envía el e-mail usando la función mail() de PHP
            $headers = 'From: ' . $email_from . "\r\n" .
            'Reply-To: ' . $email_from . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            @mail($email_to, $email_subject, $email_message, $headers);

            ?>







	    	<?php
header("Refresh:5; URL=index.php");

        }
    }
}

?>



</body>
</html>
<?php
ob_end_flush();
?>