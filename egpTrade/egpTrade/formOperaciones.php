<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Operaciones</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <?php
    // include("altaOperacion.php");

    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $consulta = "SELECT * FROM cliente WHERE nroCliente='$id'";
      $query = mysqli_query($conexion, $consulta);

      $row = mysqli_fetch_array($query);
  }
  ?>

   <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">EGP Trade</span>
      </a>
    </div>

    <div class="nav-container" style="flex-grow: 1; display: flex; justify-content: flex-end; align-items: center;">
      <a class="nav-link collapsed" href="buscador.php">
        <i class="bi bi-search" id="lupa" style="font-size: 1.2rem; margin-right: 20px; color: #333;"></i>
      </a>
    </div>
  </header> 

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Inicio</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>Clientes</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="formClientes.php">
              <i class="bi bi-circle"></i><span>Nuevo cliente</span>
            </a>
          </li>
          <li>
            <a href="listado-clientes.php">
              <i class="bi bi-circle"></i><span>Ver listado</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-globe"></i><span>Operaciones</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="formOperaciones.php">
              <i class="bi bi-circle"></i><span>Nueva operacion</span>
            </a>
          </li>
          <li>
            <a href="listado-operaciones.php">
              <i class="bi bi-circle"></i><span>Ver listado</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="">
          <i class="bi bi-calculator"></i>
          <span>Calculadora</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="">
          <i class="bi bi-file-text"></i>
          <span>Presupuesto</span>
        </a>
      </li>

      <li class="nav-heading"><hr></li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="perfil.php">
          <i class="bi bi-person"></i>
          <span>Perfil</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="login.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Salir</span>
        </a>
      </li>
    </ul>

  </aside><!-- End Sidebar-->
  <main id="main" class="main">
    <section class="section">
        <form class="formOP" action="altaOperacion.php" method="POST" id="form-operaciones">
            <div class="container">
                <div class="container-title">
                    <h1>Alta de Operaciones</h1>
                </div>
                <div class="container-body">
                <div class="row">
                        <div class="col-md-4 mb-2">
                            <label for="nro_cliente" class="form-label">Nro cliente</label>
                            <input name="cliente_nro" type="number" class="form-control" min="0" value="<?php echo $row['nroCliente'] ?>">
                        </div>
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <label for="destinacion" class="form-label">Destinacion</label>
                            <input id="destinacion" name="destinacion" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <label for="mercaderia" class="form-label">Mercaderia</label>
                            <input id="mercaderia" name="mercaderia" type="text" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="num_oficializacion" class="form-label">Nro Oficializacion</label>
                            <input name="nroOficializacion" type="text" class="form-control" min="1">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <label for="fecha_of" class="form-label">Fecha Oficializacion</label>
                            <input name="fechaOficializacion" type="date" class="form-control" min="0">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="transporte" class="form-label">Transporte</label>
                            <select name="transporte_id" class="form-control" required>
                                <option value="">Seleccione una opcion</option>
                                <option value="1">Avion</option>
                                <option value="2">Barco</option>
                                <option value="3">Tren</option>
                                <option value="4">Camion</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="dig" class="form-label">Digitalizacion</label>
                            <select name="digitalizacion_id" class="form-control" required>
                                <option value="">Seleccione una opcion</option>
                                <option value="1">Lakaut</option>
                                <option value="2">Modoc</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                        <button type="button" class="btn btn-secondary me-2" onclick="cancelar()">Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
</main>

<script>
  function cancelar(){
    window.location.href= 'index.php'
  }
</script>

  <!-- ======= Footer ======= -->
  <!-- <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits"> -->
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>