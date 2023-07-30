<?php echo "string"; ?>
 <?php 
include '../Conexion/conexion.php';

 ?>
 <?php 
session_start();
if (isset($_SESSION['ID'])) {

  header("Location: ../index.php");
}
else{
	header("Location: ../index.php");
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