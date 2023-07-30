
<?php
session_start();
if (!isset($_SESSION['ID_USUARIO'])) {
    echo ("No se ha logeado");
    header("Location: index.php");
} else {
    //echo ("Logeado");
    //echo ($_SESSION['ID_USER']);
    //echo ($_SESSION['name_user']);
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Realizar ventas</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">





<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>


<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">




<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">
<img src="./Logo/unan_logo.gif" id="logo-img" style="width: 25px; " class=" img-fluid img-circle" alt="Responsive image">
UALN - UNANLeon</a>

  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="cerrar_sesion.php">Exit</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./center.php">
              <span data-feather="home" class="align-text-bottom"></span>
              Inicio

            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="agregar_productos.php">
              <span data-feather="file" class="align-text-bottom"></span>
              Agregar Productos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reporte_ventas.php">
              <span data-feather="file" class="align-text-bottom"></span>
              Reporte de Ventas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="registrar_ventas.php">
              <span data-feather="shopping-cart" class="align-text-bottom"></span>
              Realizar ventas
            </a>
          </li>
        </ul>

      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
        <?php
                include './conexion_bbdd/index.php';
                $usuarioname = $conex->query("SELECT * from usuario WHERE ID_USUARIO = '" . $_SESSION['ID_USUARIO'] . "'");
                $rowuser = $usuarioname->fetch_assoc();
                ?>

                <br><br>

                    <?php echo ("Bienvenido "); ?>
                    <?php echo $rowuser['Nombre']; ?>
                    <?php echo $rowuser['Apellido'] . ".<br>"; ?>
                    <?php //echo "El cargo de usted es: "; ?>
                    <?php //echo $rowuser['Cargo']; ?></h1>

                    </div>

                        <h2>Registrar ventas</h2>
                        <form method="post">
                    <div class="form-row">
                              
                          <div class="form-group">
                              <label for="formGroupExampleInput">Codigo de Producto</label>
                              <input type="text" class="form-control" id="formGroupExampleInput" name="Codigo_producto" placeholder="Codigo del producto" required>
                          </div>
                          <div class="form-group">
                              <label for="formGroupExampleInput">Cantidad de los productos a vender</label>
                              <input type="text" class="form-control" id="formGroupExampleInput" name="Cantidad_vender" placeholder="Cantidad a vender" required>
                          </div> <br>
                          <div class="form-group">
                              <input type="hidden" class="form-control" id="formGroupExampleInput" name="Sesion_input_hidden" value="<?php echo $_SESSION['ID_USUARIO'] ?>" placeholder="<?php echo $_SESSION['ID_USUARIO'] ?>" required>
                          </div> 
                                

                      <button type="submit" name="btn_registrar_viajes" class="btn btn-primary">Enviar</button>
                    </div>
                      <?php 
                      include 'config_registrar_ventas/config_registrar_ventas.php';
                      ?>
                              <!--height: 400px;-->

                      </form>
                              <?php
                      //include 'config_registrar_viajes/ajustes_registrar_viajes.php';
                      //include 'config_registrar_viajes/ajustes_registrar_viajes.php';?>
                      <br><br>
      
    <?php
#include 'Configuracion/config.php';
//include 'Configuracion/config_agregar_producto.php';
?>


<?php
//include 'Configuracion/config_register.php';

$usuarioname = $conex->query("SELECT * from precio ");
?>
    <table class="table table-sm table-dark">
  <thead>
    <tr>
      <th scope="col">Codigo</th>
      <th scope="col">Disponible</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Precio</th>
      <th scope="col">Accion</th>
      <th scope="col"> .</th>
    </tr>
  </thead>
      <?php

$table = mysqli_query($conex, "SELECT *  FROM precio ");
if (mysqli_num_rows($table) > 0) {
    while ($rowuser = mysqli_fetch_array($usuarioname)) {
        //echo ("lleno");?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $rowuser['Code_Producto']; ?></th>
      <td><?php echo $rowuser['Cantidad_Producto']; ?></td>
      <td><?php echo $rowuser['Name_producto']; ?></td>
      <td><?php echo $rowuser['Descripcion_producto']; ?></td>
      <td><?php echo $rowuser['Precio_Venta']; ?></td>
      <td>
  <form  method="post">
  <div class="form-group">
  <input type="hidden" value="<?php echo $rowuser['Code_Producto']; ?>" name="Input_Editar_ID_USER" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?php echo $rowuser['Code_Producto']; ?>">
  <input type="hidden" value="<?php echo $rowuser['Cantidad_Producto']; ?>" name="Input_Editar_Nombre_USER" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?php echo $rowuser['Cantidad_Producto']; ?>">
  <input type="hidden" value="<?php echo $rowuser['Name_producto']; ?>" name="Input_Editar_Precio_USER" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?php echo $rowuser['Name_producto']; ?>">
  <input type="hidden" value="<?php echo $rowuser['Descripcion_producto']; ?>" name="Input_Editar_Disponible_USER" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?php echo $rowuser['Descripcion_producto']; ?>">
  <input type="hidden" value="<?php echo $rowuser['Precio_Venta']; ?>" name="Input_Editar_Disponible_USER" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?php echo $rowuser['Precio_Venta']; ?>">
  </div>
  <button type="submit" class="btn btn-primary" name="btn_edit">Editar</button>
</form>
<?php
//include 'Configuracion/config_edit.php';
        ?>
</td>
      <td>
<form method="post" >
  <div class="form-group">
    <input type="hidden" value="<?php echo $rowuser['Code_Producto']; ?>" name="Delete_Editar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?php echo $rowuser['Code_Producto']; ?>">
  </div>
  <button type="submit" class="btn btn-primary" name="btn_delete">Borrar</button>
</form>
<?php
//include 'Configuracion/config_delete.php';
        ?>
</td>
    </tr>
  </tbody>
    <?php
}
} else {
    //echo ("Sin Datos en la tabla ");
    ?>
<h1>Sin Datos en la tabla </h1><?php
  }
?>
</table>
<?php
#include 'Configuracion/config_login.php';

if (isset($_POST['btn_edit'])) {

  $Input_Editar_ID_USER2 = trim($_POST['Input_Editar_ID_USER']);
  $Input_Editar_Nombre_USER2 = trim($_POST['Input_Editar_Nombre_USER']);
  $Input_Editar_Precio_USER2 = trim($_POST['Input_Editar_Precio_USER']);
  $Input_Editar_Disponible_USER2 = trim($_POST['Input_Editar_Disponible_USER']);  
  //echo ($Input_Editar2); 

?>

<form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">ID_USUARIO</label>
    <input type="text"   name="edit_ID_USER" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo ($Input_Editar_ID_USER2); ; ?> " placeholder="<?php echo ($Input_Editar_ID_USER2); ; ?>" >
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo ($Input_Editar_Nombre_USER2); ; ?> " placeholder="<?php echo ($Input_Editar_Nombre_USER2); ; ?>"   name="edit_Nombre" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Precio</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo ($Input_Editar_Precio_USER2); ; ?> " placeholder="<?php echo ($Input_Editar_Precio_USER2); ; ?>" name="edit_Precio" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Disponible</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo ($Input_Editar_Disponible_USER2); ; ?> " placeholder="<?php echo ($Input_Editar_Disponible_USER2); ; ?>" name="edit_Disponible" required">
  </div>
  <button type="submit" class="btn btn-primary" name="btn_edit_form2">Guardar cambios</button>
</form>
  <?php 




if (isset($_POST['btn_edit_form2'])) {
  //recibir los datos y almacenar variables
      #$Fecha_Reg = date("d/m/y");#$Fecha_Reg = date("d/m/y");
      $edit_ID_USER2 = trim($_POST['edit_ID_USER']);
      $edit_Nombre2 = trim($_POST['edit_Nombre']);
      $edit_Precio2 = trim($_POST['edit_Precio']);
      $edit_Disponible2 = trim($_POST['edit_Disponible']);
      echo ($edit_ID_USER2);
      echo ("boton");
  } else {
      echo ("Sin presionar el boton");
  }
  
//include 'Configuracion/config_edit.php';
}
  else {
    //echo("No se ha presionado nada ");
  }
?>
</main>
</div>

</div>

</div>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
