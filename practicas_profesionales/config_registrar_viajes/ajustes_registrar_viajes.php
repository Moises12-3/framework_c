<?php
ob_start();
?>


<!DOCTYPE html>
<html>
<head>
      <link rel="stylesheet" type="text/css" href="e.stilos2/estilos_registro.css">
    <title></title>
</head>
<body>


<?php

include './conexion_bbdd/index.php';

if (isset($_POST['btn_registro'])) {
//recibir los datos y almacenar variables
    #$Fecha_Reg = date("d/m/y");
    $Cantidad_producto2 = trim($_POST['Cantidad_producto']);
    $name_producto2 = trim($_POST['name_producto']);
    $Descripcion_producto2 = trim($_POST['descripcion_completo']);
    $precio_venta2 = trim($_POST['precio_venta']);
    $Date2 = trim($_POST['Fecha_Date']);
//aleatorio
    $aleatorio = uniqid();
//consulta para insertar
    //$insertar="INSERT INTO usuario_corinto (Fecha_Reg, Nombre,Apellido ,name_user , password, code) VALUES (now(), '$Primer_Nombre','$Primer_Apellido' ,'$Email' , '$password','$aleatorio')";
    //Nombre    Apellido    Codigo  Celular Email   Password    User    
    
    //echo $aleatorio,  "<br>", $Cantidad_producto2,  "<br>", $name_producto2,  "<br>", $Descripcion_producto2,  "<br>", $precio_venta2, "<br>" ;
    //header("Refresh:4; URL=center.php");
    
    $insertar = "INSERT INTO precio (Code_Producto, Cantidad_Producto,  Name_producto, Descripcion_producto, Precio_Venta, Fecha_Precio2)
        VALUES ('$aleatorio', '$Cantidad_producto2','$name_producto2',  '$Descripcion_producto2', '$precio_venta2', '$Date2'/*, now()*/ )";
    //echo $aleatorio,  "<br>", $Cantidad_producto2,  "<br>", $name_producto2,  "<br>", $Descripcion_producto2,  "<br>", $precio_venta2, "<br>" ;
    /*$insertar = "INSERT INTO usuario (Fecha_Reg , code, M, Nombre, Apellido,
         Email , password,Telefono)
         VALUES (now(),'$aleatorio', '$name_usuario', '$Primer_Nombre', '$Primer_Apellido', '$Email', '$password', '$Celular')";*/

    $verificar_Email = mysqli_query($conex, "SELECT *  FROM precio WHERE Name_producto='$name_producto2' /*or Code_Producto='$aleatorio'*/  ");

    //echo $aleatorio,  "<br>", $Cantidad_producto2,  "<br>", $name_producto2,  "<br>", $Descripcion_producto2,  "<br>", $precio_venta2, "<br>" ;
    if (mysqli_num_rows($verificar_Email) > 0) {

        ?>
    <h1 class="h1">Este producto ya esta registrado</h1>
    <?php
    //header("Refresh:4; URL=center.php");
    }
//Ejecutar consulta
    else {
        $resultado = mysqli_query($conex, $insertar);

        if (!$resultado) {
            ?>
            <h1 class="h1">Error al registrar</h1>
            <?php
//header("Refresh:5; URL=./agregar_productos.php");
        } else {
            ?>


     <h1 class="h1">El producto se ha registrado con exito.</h1>

     <?php #inicia la verificacion del registro ?>
        <?php

            ?>
            <?php
//header("Refresh:5; URL=./agregar_producto.php");

//include './agregar_productos.php';
        }
    }
} else{
    echo "Rellene el formulario";
}

?>



</body>
</html>