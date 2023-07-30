<?php
ob_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<?php

include './conexion_bbdd/index.php';

if (isset($_POST['btn_registrar_camion2'])) {
//recibir los datos y almacenar variables
    #$Fecha_Reg = date("d/m/y");
    $Marca_camion2 = trim($_POST['Marca_camion']);
    $Placa_camion2 = trim($_POST['Placa_camion']);
    $Caracteristicas_pesadas = trim($_POST['seleccionar']);
    $Volumen_camion2 = trim($_POST['Volumen_camion']);
//aleatorio
    $aleatorio = uniqid();
//consulta para insertar
    //$insertar="INSERT INTO usuario_corinto (Fecha_Reg, Nombre,Apellido ,name_user , password, code) VALUES (now(), '$Primer_Nombre','$Primer_Apellido' ,'$Email' , '$password','$aleatorio')";

    /*$insertar="INSERT INTO usuario_corinto (Fecha_Reg , code, name_user, Nombre, Apellido,
    Email , password,Telefono)
    VALUES (now(),'$aleatorio', '$name_usuario', '$Primer_Nombre', '$Primer_Apellido', '$Email', '$password', '$Celular')";*/

    $insertar = "INSERT INTO volumen_camion (Marcas , Caracteristicas_pesadas , Placa, Volumen)
VALUES ('$Marca_camion2',  '$Caracteristicas_pesadas', '$Placa_camion2','$Volumen_camion2')";

    $verificar_Email = mysqli_query($conex, "SELECT *  FROM volumen_camion WHERE Placa = '$Placa_camion2'  ");

    if (mysqli_num_rows($verificar_Email) > 0) {

        ?>
	<h1 class="h1">Este placa ya esta registrado</h1>
    
<script>

function callback ( ) {
  let targetURL = 'registrar_camion.php';
let newURL = document.createElement('a');
newURL.href = targetURL;
document.body.appendChild(newURL);
newURL.click();


}

console.log ('Empiezo');

setTimeout (callback, 5000)
</script>
	<?php
//header("Refresh:5; URL=registrar_camion.php");

        //header("Refresh:4; URL=index.php");
    }
//Ejecutar consulta
    else {
        $resultado = mysqli_query($conex, $insertar);

        if (!$resultado) {
            ?>
	    	<h1 class="h1"> Error al registrar</h1>
    
    <script>
    
    function callback ( ) {
      let targetURL = 'registrar_camion.php';
    let newURL = document.createElement('a');
    newURL.href = targetURL;
    document.body.appendChild(newURL);
    newURL.click();
    
    
    }
    
    console.log ('Empiezo');
    
    setTimeout (callback, 5000)
    </script>
	    	<?php
//header("Refresh:5; URL=registrar_camion.php");
        } else {
            ?>


	 <h1 class="h1">¡Felicidades, se ha registrado exitosamente! <a href="index.php">Espere  5 segundos por favor</a> </h1>

	 <?php #inicia la verificacion del registro ?>
	    <?php

            ?>




    
<script>

function callback ( ) {
  let targetURL = 'registrar_camion.php';
let newURL = document.createElement('a');
newURL.href = targetURL;
document.body.appendChild(newURL);
newURL.click();


}

console.log ('Empiezo');

setTimeout (callback, 5000)
</script>



	    	<?php
//header("Refresh:5; URL=../registrar_camion.php");

        }
    }
}

?>


<script src="../registrar_camion.php"></script>
</body>
</html>
<?php
ob_end_flush();
?>