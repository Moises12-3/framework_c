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

<b>
<?php

include './conexion_bbdd/index.php';

if (isset($_POST['btn_registrar_viajes'])) {
//recibir los datos y almacenar variables
    #$Fecha_Reg = date("d/m/y");
    $Codigo_producto2 = trim($_POST['Codigo_producto']);
    $Cantidad_vender2 = trim($_POST['Cantidad_vender']);
    $sesion_user_report = trim($_POST['Sesion_input_hidden']);
    $resultados_registrar_ventas = 0;
    $resultados_cantidad = 0;
//aleatorio
    $aleatorio = uniqid();
//consulta para insertar
    //$insertar="INSERT INTO usuario_corinto (Fecha_Reg, Nombre,Apellido ,name_user , password, code) VALUES (now(), '$Primer_Nombre','$Primer_Apellido' ,'$Email' , '$password','$aleatorio')";
    //Nombre    Apellido    Codigo  Celular Email   Password    User    
    
    //echo $aleatorio,  "<br>", $Cantidad_producto2,  "<br>", $name_producto2,  "<br>", $Descripcion_producto2,  "<br>", $precio_venta2, "<br>" ;
    //header("Refresh:4; URL=center.php");
    
$usuarioname_registrat_venta = $conex->query("SELECT * from precio WHERE Code_Producto = '$Codigo_producto2'");
$rowuser_registrat_venta_p = $usuarioname_registrat_venta->fetch_assoc();
    //echo $aleatorio,  "<br>", $Cantidad_producto2,  "<br>", $name_producto2,  "<br>", $Descripcion_producto2,  "<br>", $precio_venta2, "<br>" ;
    /*$insertar = "INSERT INTO usuario (Fecha_Reg , code, M, Nombre, Apellido,
         Email , password,Telefono)
         VALUES (now(),'$aleatorio', '$name_usuario', '$Primer_Nombre', '$Primer_Apellido', '$Email', '$password', '$Celular')";*/

    $verificar_Email = mysqli_query($conex, "SELECT *  FROM precio WHERE Code_Producto='$Codigo_producto2'");

    //echo $aleatorio,  "<br>", $Cantidad_producto2,  "<br>", $name_producto2,  "<br>", $Descripcion_producto2,  "<br>", $precio_venta2, "<br>" ;
    if (mysqli_num_rows($verificar_Email) > 0) {

        ?>
    <h1 class="h1">Ya existe</h1>   
    
    <?php


    $Cantidad_Producto__registrar_venta = mysqli_query($conex, "SELECT *  FROM precio WHERE Code_Producto='$Codigo_producto2'");   
    $rowuser_registrat_venta2 = $Cantidad_Producto__registrar_venta->fetch_assoc();
    if ($rowuser_registrat_venta2['Cantidad_Producto'] >=  $Cantidad_vender2) {
    //echo ("Muchos");
?>
 <br>
    <?php //echo $rowuser_registrat_venta2['ID_Precio']; ?><br>
    <?php echo "Productos en existencias: " , $rowuser_registrat_venta2['Cantidad_Producto']; ?><br>
    <?php echo "Codigo del producto: ". $rowuser_registrat_venta2['Code_Producto']; ?><br>
    <?php echo "Nombre del producto: ". $rowuser_registrat_venta2['Name_producto']; ?><br>
    <?php echo "Descripcion del producto: ". $rowuser_registrat_venta2['Descripcion_producto']; ?><br>
    <?php echo "El precio de Venta es: ",$rowuser_registrat_venta2['Precio_Venta']; ?><br>
    <?php echo "Cantidad de producto a comprar: ", $Cantidad_vender2; ?><br>
    <?php 
    $resultados_registrar_ventas = $rowuser_registrat_venta2['Precio_Venta'] * $Cantidad_vender2;
    ?>
    
    <?php echo "El total a pagar: ", $resultados_registrar_ventas; ?><br>
    <?php 
    $resultados_cantidad =  $rowuser_registrat_venta2['Cantidad_Producto'] - $Cantidad_vender2; 
    ?>
<?php echo "Cantidad de existencias actual: ", $resultados_cantidad; ?><br>

<?php 
    $rowuser_registrat_venta_ID_Precio = $rowuser_registrat_venta2['Code_Producto'];
    //echo $rowuser_registrat_venta_ID_Precio;
    $consulta_resultado_precio= "UPDATE `precio` SET `Cantidad_Producto` = '$resultados_cantidad' WHERE `Code_Producto` = '$rowuser_registrat_venta_ID_Precio'";
    //$consulta_resultado_precio = mysqli_query($conex, $precio);
    
    $resultado2=mysqli_query($conex,$consulta_resultado_precio);
    if ($consulta_resultado_precio) {
        echo("Se  actualizo la tabla precio". '<br>');
    }
    // Insertar en la tabla reporte
    $sesion_user_report = $_SESSION['ID_USUARIO'];
    //$Cantidad_Producto_user_report = $rowuser_registrat_venta['Cantidad_Producto'];
    //$Code_Producto_report = $rowuser_registrat_venta['Code_Producto'];
    //$Cantidad_Producto_user_report = $rowuser_registrat_venta['ID_USUARIO'];

    $Code_Producto_report = $rowuser_registrat_venta2['Code_Producto'];

    $reporte_product_report = "INSERT INTO reporte (ID_USUARIO_reporte, Cant_venta_reporte, ID_Producto_reporte, Total_pagar_reporte, Fecha_reporte, Hora_reporte)
        VALUES ('$sesion_user_report', '$Cantidad_vender2','$Code_Producto_report',  '$resultados_registrar_ventas', now(), now() /*, now()*/ )";
 
 $resultado3=mysqli_query($conex,$reporte_product_report);
 if ($reporte_product_report) {
     echo("Se  actualizo la tabla precio reporte". '<br>');
 }
    // Fin Insertar en la tabla reporte
?>

<?php
} else {
    echo "Error, productos en existencias: ", $rowuser_registrat_venta['Cantidad_Producto'];
}
    //header("Refresh:4; URL=center.php");
    }
//Ejecutar consulta
    else {
        //$resultado = mysqli_query($conex, $rowuser_registrat_venta_p);
        //mysqli_num_rows($resultado) > 0
        
            ?>


     <h1 class="h1">No se ha encontrado el producto</h1>

            <?php
//header("Refresh:5; URL=./agregar_producto.php");

        
    }
} else{
    echo "Rellene el formulario";
}

?>
</b>


</body>
</html>