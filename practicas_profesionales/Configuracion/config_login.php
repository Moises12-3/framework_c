

<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet" type="text/css" href="estilos2/estilos_login.css">
</head>
<body>

<?php
include 'conexion_bbdd/index.php';

if (isset($_POST['Login'])) {
 //   echo ("boton");

    $Email2 = $_POST['Email'];
    $password2 = md5($_POST['password']);
echo $Email2, $password2;

    $validar = $conex->query("SELECT * FROM usuario WHERE User = '$Email2' AND Password = '$password2'");

    if ($validar->num_rows > 0) {
        echo ("Conexion exitosa");
        $r = $validar->fetch_array();
        session_start();
        $_SESSION['ID_USUARIO'] = $r['ID_USUARIO'];
        $_SESSION['User'] = $r['User'];
        /**/header("Location: center.php");

    }
//$contar=$validar->num_rows;
//$id_use=$validar->fetch_assoc();

//if ($contar==1) {
//session_start();
    //$_SESSION["usuario"]=$_POST["Email"];
    //$_SESSION["id_use"]=$_POST["id_use"];
    //header("Location: center.php");
//}

/**/else {

        ?>
	<h1 class="h1">Usuario y/o password incorrecta</h1>
	<?php
header("Refresh:4; URL=index.php");

    }

} else{
    echo "Conexion";
}
?>

</body>
</html>