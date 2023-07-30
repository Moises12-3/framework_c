
<?php 
#codigo para subir archivo
#if (isset($_POST['enviar'])) {

	#$conex=mysqli_connect("localhost", "root","","red");

	#$mensajes_de_publicacion2 = $_POST['mensajes_de_publicacion1'];
#$foto= $_POST['foto']
#(){}
#$insertar = $conex->query("INSERT INTO publicaciones_de_imagenes (mensajes_de_publicacion, fecha_de_publicacion) VALUES  ('$mensajes_de_publicacion2', now())");
#if ($insertar) {
#echo "Se subio";

#}

#}
 ?>

<?php 

if (isset($_POST['enviar'])) {

	$conex=mysqli_connect("localhost", "root","","red");

	#$mensajes_de_publicacion2 = $_POST['mensajes_de_publicacion1'];

	$nom=$_REQUEST["mensajes_de_publicacion1"];
	$foto=$_FILES["foto"]["name"];
	$ruta=$_FILES["foto"]["tmp_name"];

	$destino="./imagenes/".$foto;
#$foto= $_POST['foto']
#(){}
copy($ruta, $destino);

$insertar = $conex->query("INSERT INTO publicaciones_de_imagenes (mensajes_de_publicacion, imagenes, fecha_de_publicacion) VALUES ('$nom','$destino', now())");

if ($insertar) {
	echo "Se ha subido correctamente";
	# code...
}
}
 ?>


<?php 

#se sube la imagen
if (isset($_POST['enviar'])) {

    $conex=mysqli_connect("localhost", "root","","red");

    #$mensajes_de_publicacion2 = $_POST['mensajes_de_publicacion1'];

    $nom=$_REQUEST["mensajes_de_publicacion1"];
    $foto=$_FILES["foto"]["name"];
    $ruta=$_FILES["foto"]["tmp_name"];

    $destino="imagenes/".$foto;
#$foto= $_POST['foto']
#(){}
copy($foto, $destino);

$insertar = $conex->query("INSERT INTO publicaciones_de_imagenes (mensajes_de_publicacion, imagenes, fecha_de_publicacion) VALUES ('$nom','$destino', now())");
header("Location: publicar_imagenes.php");

if ($insertar) {
    echo "Se ha subido correctamente";
    # code...
}
}

#donde se guarda la ruta de la imagen la columna debe ser varchar



 ?>





 <?php 
 #muestra el archivo
     $conex=mysqli_connect("localhost", "root","","red");

$sql = $conex->query("SELECT * FROM publicaciones_de_imagenes");
while ($res = mysqli_fetch_array($sql)) {
  
    echo $res["mensajes_de_publicacion"];?> <br>
   <?php echo $res['imagenes']; ?><br><br>
<?php 
    # code...
}

  ?>






<?php 

#if (isset($_POST['enviar'])) {

	#$conex=mysqli_connect("localhost", "root","","red");

	#$mensajes_de_publicacion2 = $_POST['mensajes_de_publicacion1'];

	#$nom=$_REQUEST["mensajes_de_publicacion1"];
	#$foto=$_FILES["foto"]["name"];
	#$ruta=$_FILES["foto"]["tmp_name"];
	#$destino="./imagenes/".$foto;
#$foto= $_POST['foto']
#(){}
#copy($ruta, $destino);

#$insertar = $conex->query("INSERT INTO publicaciones_de_imagenes (mensajes_de_publicacion, imagenes, fecha_de_publicacion) VALUES ('$nom','$destino', now())");

#if ($insertar) {
	#echo "Se ha subido correctamente";
	# code...
#}
#}
 ?>