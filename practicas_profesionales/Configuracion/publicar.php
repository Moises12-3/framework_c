<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form method="POST" action="">
	<input type="text" placeholder="Que estas pensando!" name="mensaje"><br>
	
	<input type="submit" name="share" value="Publicar">
</form>

<?php 
include 'Conexion/conexion2.php';
if (isset($_POST['share'])) {

$share = $_POST["mensaje"];
//consulta para insertar
$insertar=$conex->query("INSERT INTO publicaciones (mensaje_de_publicacion, usuario, fecha_de_publicar) VALUES ('$share','".$_SESSION['ID']."', now())");
//ejecutar consulta

}

?>





<br>

<?php 
//Mostar usuario consulta
include 'Conexion/conexion.php';
$mensajes=$conex->query("SELECT * FROM publicaciones ORDER BY id_use desc"); 
while ($row = $mensajes->fetch_assoc()) {

#$usuarioname = $conex->query("SELECT usuario from usuarios WHERE id = '".$row['usuario']."'");
#$rowuser = $usuarioname->fetch_assoc();

$usuarioname = $conex->query("SELECT Primer_Nombre, Segundo_Nombre, Primer_Apellido, Segundo_Apellido, Avatar from usuarios_pass WHERE ID = '".$row['usuario']."'");
$rowuser = $usuarioname->fetch_assoc();

#selecciona de donde

#usuarios, id, usuario, clave, fecha

#publicaciones, id, mensaje, usuario, fecha
	?>       
  <a href="./publicar_imagenes.php?id=<?php echo $row['usuario'] ?>">Subir imagen</a>
    <a href="./prueba.php?id=<?php echo $row['usuario'] ?>">prueba</a>

<br><br>

<div>
	<div><h4><?php echo $row['mensaje_de_publicacion']; ?></h3></div>
	<div>	


		<a href="./perfil.php?id=<?php echo $row['usuario'] ?>">
		<h5><img src="<?php echo $rowuser['Avatar']; ?>"width="30">
			<?php echo $rowuser['Primer_Nombre']; ?>
			<?php echo $rowuser['Segundo_Nombre']; ?>
			<?php echo $rowuser['Primer_Apellido']; ?>
			<?php echo $rowuser['Segundo_Apellido']; ?></h5></a>	</div>

</div>
<br>

<?php  }
#Primer_Nombre, Segundo_Nombre, Primer_Apellido, Segundo_Apellido
//<a href="perfil.php?id=<?php echo $row['usuario'];" 
#$_SESSION['ID']
 ?>

</body>
</html>