<?php 

if (isset($_POST['btn_registro_date'])) {
?>

<!--height: 400px;-->






<?php

$Fecha = trim($_POST['date_filter']);
echo $Fecha;
//include 'Configuracion/config_register.php';

   ?>
   <?php
   
//$usuarioname = $conex->query("SELECT * FROM `precio` INNER join `reporte` ON precio.Code_Producto = reporte.ID_Producto_reporte WHERE precio.Name_producto = 'Arroz Faisan'; ");
 ?>

        <?php
$usuarioname = $conex->query("SELECT * FROM `precio` INNER join `reporte` ON precio.Code_Producto = reporte.ID_Producto_reporte WHERE reporte.Fecha_reporte = '$Fecha';");

if(mysqli_num_rows($usuarioname)>0){
    ?>
<h2>Informe de ventas</h2>
      
      <button id="btnExportar" class="btn btn-success">
                <i class="fas fa-file-excel"></i> Exportar datos a Excel
      </button><br><br>
        <?php
    //echo "se ha encontrado registro de esa fecha";
    
$usuarioname_count = $conex->query("SELECT COUNT(reporte.Total_pagar_reporte) FROM `precio` INNER join `reporte` ON precio.Code_Producto = reporte.ID_Producto_reporte WHERE reporte.Fecha_reporte = '$Fecha';");
$usuarioname_sum = $conex->query("SELECT SUM(reporte.Total_pagar_reporte) FROM `precio` INNER join `reporte` ON precio.Code_Producto = reporte.ID_Producto_reporte WHERE reporte.Fecha_reporte = '$Fecha';");

    ?>

<table id="tabla" class="table table-sm table-dark">
  <thead>
    <tr>
      <th scope="col"><center>Codigo</center></th>
      <th scope="col"><center>Disponible</center></th>
      <th scope="col"><center>Nombre</center></th>
      <th scope="col"><center>Descripcion</center></th>
      <th scope="col"><center>Vendido</center></th>
      <th scope="col"><center>Precio(C$)</center></th>
      <th scope="col"><center>Total pago(C$)</center></th>
      <th scope="col"><center>Cantidad(Totales)</center></th>
      <th scope="col"><center>Ventas(Totales C$)</center></th>
    </tr>
  </thead>
  <?php 
 ?>
  <?php 
  
$table = mysqli_query($conex, "SELECT *  FROM precio ");
if (mysqli_num_rows($table) > 0) {
    while ($rowuser = mysqli_fetch_array($usuarioname)) {
        //echo ("lleno");?>
    <tbody>
    <tr>
      <th scope="row"><?php echo $rowuser['Code_Producto']; ?></th>
      <td><center> <?php echo $rowuser['Cantidad_Producto']; ?></center></td>
      <td><center><?php echo $rowuser['Name_producto']; ?></center></td>
      <td><center><?php echo $rowuser['Descripcion_producto']; ?></center></td>
      <td><center><?php echo $rowuser['Cant_venta_reporte']; ?></center></td>
      <td><center><?php echo $rowuser['Precio_Venta']; ?></td>
      <td><center><?php echo $rowuser['Total_pagar_reporte']; ?></center></td>
      <td><center><?php 
while ($rowuser__count = mysqli_fetch_array($usuarioname_count)) {    
    //echo "<b> Total de ventas: ". $rowuser__count['COUNT(reporte.Total_pagar_reporte)']."</b><br>";
    echo "<b>". $rowuser__count['COUNT(reporte.Total_pagar_reporte)']."</b>";
}?></center>
</td>
<td><center>
    <?php    
    while ($rowuser__sum = mysqli_fetch_array($usuarioname_sum)) {
        //echo "<b> Suma total de ventas: ". $rowuser__sum['SUM(reporte.Total_pagar_reporte)']."</b><br>";
        echo "<b>". $rowuser__sum['SUM(reporte.Total_pagar_reporte)']."</b>";
}
     ?></center>
</td>
      
<?php 
}
} else {
    //echo ("Sin Datos en la tabla ");
    ?>
<h1>Sin Datos en la tabla </h1><?php
  }
?>
</table>

<?php } else{
    ?>
    <h1>No se ha encontrado registro de esa fecha</h1><?php
}

//echo "fecha";
    

?>  
<?php } else{
    //echo "Seleccione una fecha y presione el boton de filtrar"; ?>
    <h1>Seleccione una fecha y presione el boton de filtrar</h1><?php
} 
?>