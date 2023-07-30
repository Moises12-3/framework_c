<?php echo "string"; ?>
 <?php 
include '../Conexion/conexion.php';

 ?>
 <?php 
session_start();
if (isset($_SESSION['ID'])) {

  header("Location: ../Login.php");
}
else{
	header("Location: ../Login.php");
}


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>hello</title>
</head>
<body>

</body>
</html>