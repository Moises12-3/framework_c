
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
    <title>Presentacion</title>

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
      <center>
<h1>Universidad Abierta en Linea Nicaragua - UALN</h1>
<h1>Universidad Nacional Autonoma de Nicaragua - Leon </h1>
<h2>Tecnico Superior en Desarrollo Web</h2>
<h2>Año III</h2>
<img src="./logo/unan_logo.gif" alt="">
<h4><b><i>"A la Libertad por la universidad"</i></b></h4>
<br></center> 
<h2>Docente:</h2>
<h3>Ingeniero William</h3>
<br>
<h2>Nombre:</h2>
<h3>Br. Claudia Mercedes Ramos Soza</h3>
<center>
<h2>Dado a los 23 dias del mes de Julio del 2023</h2></center>

    <?php
//include 'config_registrar_viajes/ajustes_registrar_viajes.php';
;?>
<br><br>
</div>
    </main>
  </div>
</div>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>