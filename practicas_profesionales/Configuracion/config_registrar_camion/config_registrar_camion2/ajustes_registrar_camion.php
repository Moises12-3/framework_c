

<!DOCTYPE html>
<html>
<head>
	<title></title>
	  <link rel="stylesheet" type="text/css" href="estilos2/estilos_buscador.css">

</head>
<body>
<br><?php
$conex = mysqli_connect("localhost", "root", "", "bbdd_incostas_nouel");

if ($conex == false) {
    echo ("Error: Unable to connect");
} else {
    //echo("Conexion Exitosa");
}
?>
<?php
//include './conexion_bbdd/index.php';

$nombre = $_GET['nombre'];

if (!empty($nombre)) {
    $persona = $nombre;

    //$resultadoBD = $conex->query("SELECT * FROM volumen_camion WHERE Placa LIkE '%" . $persona . "%'  ");
    //$resultadoBD = $conex->query("SELECT * FROM volumen_camion WHERE Placa  = '$persona'  ");
    //$resultadoBD = $conex->query("SELECT * FROM volumen_camion WHERE Placa  = '$persona'  ");
    $resultadoBD = mysqli_query($conex, "SELECT *  FROM volumen_camion WHERE Placa='$persona'");
    //$verificar_Email=mysqli_query($conex,"SELECT *  FROM usuario_corinto WHERE Email='$Email' or name_user='$name_usuario'  ");

    while ($fila = mysqli_fetch_assoc($resultadoBD)) {?>



		<?php

        //if ($resultadoBD->num_rows > 0) {
        if (mysqli_num_rows($resultadoBD) > 0) {

            //$resultado = mysqli_query($conex, $resultadoBD);
            //echo ("true");
            ?>
            <div class="form-group">
                        <label for="formGroupExampleInput">Volumen_listo</label>
                        <input type="text" class="form-control" class="Volumen" id="formGroupExampleInput" name="Volumen" value="<?php echo $fila['Volumen']; ?>" placeholder="<?php echo $fila['Volumen']; ?>">
                    </div>


        <?php } else {
            if ($resultadoBD->num_rows < 0) {
                # code...

                echo ("true");
            } else {

                echo ("false");
            }

        }
    }
    ?>



		 <?php
} else {
    # code...

    ?>

    <div class="form-group">
            <label for="formGroupExampleInput">Ingrese el numero de placa</label>
            <input type="text" disabled class="form-control" class="Volumen" id="formGroupExampleInput" name="" value="" placeholder="Volumen desabilitado">
        </div><br>
    <h1  class="Realiza_una_busqueda"><?php echo "Realiza una busqueda"; ?></h1>
<?php
}?>



</body>
</html>




