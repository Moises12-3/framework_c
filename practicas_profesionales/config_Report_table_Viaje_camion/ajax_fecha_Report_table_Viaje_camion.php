

<!DOCTYPE html>
<html>
<head>
	<title></title>
	  <link rel="stylesheet" type="text/css" href="estilos2/estilos_buscador.css">

</head>
<body>
<?php
include '../conexion_bbdd/index.php';
/* */
$Fecha2 = $_POST['Fecha'];
$Lugar2 = $_POST['Lugar'];
$Material2 = $_POST['Material'];
$Cantera2 = $_POST['Cantera'];

if (!empty($Fecha2) || !empty($Lugar2) || !empty($Material2) || !empty($Cantera2)) {
    //echo $Fecha2 . "<br> " . $Lugar2 . "<br> " . $Material2 . "<br> " . $Cantera2 . "<br><br><br> ";
    /*echo ($Fecha2);
    echo ($Lugar2);
    echo ($Material2);
    echo ($Cantera2);*/

    $validar_Fecha2 = $conex->query("SELECT * FROM viajes_de_camiones2 WHERE Fecha = '$Fecha2' ");

    $validar_Lugar2 = $conex->query("SELECT * FROM viajes_de_camiones2 WHERE Lugar='$Lugar2'");

    $validar_Material2 = $conex->query("SELECT * FROM viajes_de_camiones2 WHERE Material='$Material2'");

    $validar_Cantera2 = $conex->query("SELECT * FROM viajes_de_camiones2 WHERE Cantera='$Cantera2'");

    $validar = $conex->query("SELECT * FROM viajes_de_camiones2 WHERE Fecha = '$Fecha2' AND Lugar='$Lugar2' AND Material='$Material2' AND Cantera='$Cantera2'");
    if ($Lugar2 == "Selecionar todo" && $Material2 == "Selecionar todo"  && $Cantera2 == "Selecionar todo" ) {
        echo ("Seleccionar todo");?>
        
            <button id="btnExportar" class="btn btn-success">
                <i class="fas fa-file-excel"></i> Exportar datos a Excel
            </button>
        <table  id="tabla"  class="table table-striped table-sm">
        <thead>
          <tr> <th scope="col">Fecha</th>
            <th scope="col">No_Ticket</th>
            <th scope="col">Lugar</th>
            <th scope="col">Placa</th>
            <th scope="col">Material</th>
            <th scope="col">Cantera</th>
            <th scope="col">Volumen_M3</th>
          </tr>
        </thead>
          <?php

include '../conexion_bbdd/index.php';
$var_lugar = $conex->query("SELECT * from viajes_de_camiones2 WHERE Fecha = '$Fecha2'  "  );
//$var_lugar2 = $var_lugar->fetch_assoc();
//SELECT * FROM `viajes_de_camiones2` WHERE Fecha = '2023-01-02' and Lugar = 'Relleno de base de Silos' 

?>

<?php //while ($var_lugar2 = mysqli_fetch_assoc($var_lugar)) {}    ?><?php //echo $var_lugar2['Lugar']; ?>

<?php
while ($var_lugar2 = mysqli_fetch_assoc($var_lugar)) {
  //Fecha ,    No_Ticket ,    Lugar    , Placa ,    Material ,    Cantera ,    Volumen_M3
  ?>
  <tbody>
    <tr>

            <td>
 <?php echo $var_lugar2['Fecha']; //3dd8e353cb36c7c4d4eae99d9e97e7ef  ?> </td>
            <td>
 <?php echo $var_lugar2['No_Ticket']; ?> </td>
            <td>
 <?php echo $var_lugar2['Lugar']; ?> </td>
            <td>
 <?php echo $var_lugar2['Placa']; ?> </td>
            <td>
 <?php echo $var_lugar2['Material']; ?> </td>
            <td>
 <?php echo $var_lugar2['Cantera']; ?> </td>
            <td>
 <?php echo $var_lugar2['Volumen_M3']; ?> </td>
          </tr>
        </tbody>
<?php
}
?>
      </table>
        <?php 
    } else { ?>
        <button id="btnExportar" class="btn btn-success">
            <i class="fas fa-file-excel"></i> Exportar datos a Excel
        </button>
    <table  id="tabla"  class="table table-striped table-sm">
    <thead>
      <tr> <th scope="col">Fecha</th>
        <th scope="col">No_Ticket</th>
        <th scope="col">Lugar</th>
        <th scope="col">Placa</th>
        <th scope="col">Material</th>
        <th scope="col">Cantera</th>
        <th scope="col">Volumen_M3</th>
      </tr>
    </thead>
      <?php

include '../conexion_bbdd/index.php';
//$var_lugar = $conex->query("SELECT * from viajes_de_camiones2 ");

$var_lugar = $conex->query("SELECT * from viajes_de_camiones2  WHERE  Fecha = '$Fecha2' and Lugar = '$Lugar2' and Material = '$Material2'  and Cantera = '$Cantera2' " );
//$var_lugar2 = $var_lugar->fetch_assoc();
//
//SELECT * FROM `viajes_de_camiones2` WHERE Fecha = '2023-01-02' and Lugar = 'Relleno de base de Silos' 
//SELECT * FROM `viajes_de_camiones2` WHERE Fecha = '2023-01-02' and Lugar = 'Relleno de base de Silos' 

?>

<?php //while ($var_lugar2 = mysqli_fetch_assoc($var_lugar)) {}    ?><?php //echo $var_lugar2['Lugar']; ?>

<?php
while ($var_lugar2 = mysqli_fetch_assoc($var_lugar)) {
//Fecha ,    No_Ticket ,    Lugar    , Placa ,    Material ,    Cantera ,    Volumen_M3
?>
<tbody>
<tr>

        <td>
<?php echo $var_lugar2['Fecha']; //3dd8e353cb36c7c4d4eae99d9e97e7ef  ?> </td>
        <td>
<?php echo $var_lugar2['No_Ticket']; ?> </td>
        <td>
<?php echo $var_lugar2['Lugar']; ?> </td>
        <td>
<?php echo $var_lugar2['Placa']; ?> </td>
        <td>
<?php echo $var_lugar2['Material']; ?> </td>
        <td>
<?php echo $var_lugar2['Cantera']; ?> </td>
        <td>
<?php echo $var_lugar2['Volumen_M3']; ?> </td>
      </tr>
    </tbody>
<?php
}
?>
  </table>
  <?php 
        echo ("false");
        
    }
    /*if ($Fecha2 == "Selecionar todo") {  
        
    } else {
        echo (" Fecha: ".$Fecha2. "<br><br>");
        if ($Lugar2 == "Selecionar todo") {
            echo (" Lugar: ".$Lugar2. " true <br><br>");
            if ($Material2 == "Selecionar todo") {
                echo (" Material2: ".$Material2. " true <br><br>");
                
                    if ($Cantera2 == "Selecionar todo") {
                        echo (" Cantera2: ".$Cantera2. " true <br><br>");
                    } else {
                        echo (" Cantera2: ".$Cantera2. " false <br><br>");
                    }
            } else {
                echo (" Material2: ".$Material2. " false <br><br>");
            }
        } else {
            echo (" Lugar2: ".$Lugar2. " false <br><br>");
        }
        
    }*/
    /*if ($validar_Lugar2->num_rows > 0) {
    echo ("Encontrado");

    }
    if ($validar_Material2->num_rows > 0) {
    echo ("Encontrado");

    }
    if ($validar_Cantera2->num_rows > 0) {
    echo ("Encontrado");

    }
    if ($validar_Fecha2->num_rows > 0) {
    echo ("Encontrado");

    } */
//$contar=$validar->num_rows;
//$id_use=$validar->fetch_assoc();

//if ($contar==1) {
//session_start();
//$_SESSION["usuario"]=$_POST["Email"];
//$_SESSION["id_use"]=$_POST["id_use"];
//header("Location: center.php");
//}

/**/

        ?>
<?php

    

} else {
    # code...

    ?><br>
    <h1  class="No se encontro resultado"><?php echo "Vacio"; ?></h1>
<?php
header("Refresh:4; URL=index.php");
}?>


<script src="../export_excel/script_excel.js">
    //<!-- script para exportar a excel -->

const $btnExportar = document.querySelector("#btnExportar"),
    $tabla = document.querySelector("#tabla");

$btnExportar.addEventListener("click", function() {
    let tableExport = new TableExport($tabla, {
        exportButtons: false, // No queremos botones
        filename: "Reporte de prueba", //Nombre del archivo de Excel
        sheetname: "Reporte de prueba", //Título de la hoja
    });
    let datos = tableExport.getExportData();
    let preferenciasDocumento = datos.tabla.xlsx;
    tableExport.export2file(preferenciasDocumento.data, preferenciasDocumento.mimeType, preferenciasDocumento.filename, preferenciasDocumento.fileExtension, preferenciasDocumento.merges, preferenciasDocumento.RTL, preferenciasDocumento.sheetname);
});
</script>
<script src="../export_excel/script_excel.js"></script>
    <script src="../export_excel/01_excel.js"></script>
    <script src="../export_excel/02_excel.js"></script>
    <script src="../export_excel/03_excel.js"></script>


</body>
</html>




