<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Modificar Cliente</title>
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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <?php
    include("conexion.php");
    
    $id= $_GET['id'];
    $consulta = "SELECT * FROM clienteprueba WHERE nroCliente='$id'";
    $query= mysqli_query($conexion,$consulta);

    $row = mysqli_fetch_array($query);
    
  ?>
    <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">EGP Trade</span>
      </a>
    </div><!-- End Logo -->

    <!-- Contenedor para la lupa alineada a la derecha -->
    <div class="nav-container" style="flex-grow: 1; display: flex; justify-content: flex-end; align-items: center;">
      <a class="nav-link collapsed" href="#">
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
      </li><!-- End inicio Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>Clientes</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="altaCliente.php">
              <i class="bi bi-circle"></i><span>Nuevo cliente</span>
            </a>
          </li>
          <li>
            <a href="listado-clientes.php">
              <i class="bi bi-circle"></i><span>Ver listado</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-globe"></i><span>Operaciones</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Nueva operacion</span>
            </a>
          </li>
          <li>
            <a href="#">
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
  <main class="main">
    <section class="section">
        <form class="form" action="modificar-cliente.php" method="POST"> 
            <div class="container">
                <div class="container-title">
                    <h1>Modificar Cliente</h1>
                </div>
                <div class="container-body">
                    <div class="row">
                        <div class="col-md-2 mb-1">
                            <label for="nroCliente" class="form-label">Nro Cliente</label>
                            <input id="nroCliente" name="nroCliente" class="form-control form-control-sm" value="<?php echo $row['nroCliente']; ?>" readonly>
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="razon_social" class="form-label">Razón Social</label>
                            <input id="razon_social" name="razonSocial" type="text" class="form-control form-control-sm" required value="<?php echo $row['razonSocial']?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-1">
                            <label for="dom_fiscal" class="form-label">Domicilio Fiscal</label>
                            <input id="dom_fiscal" name="domicilioFiscal" type="text" class="form-control form-control-sm" required value="<?php echo $row['domicilioFiscal']?>">
                        </div>
                        <div class="col-md-2 mb-1">
                            <label for="numero_dom" class="form-label">Nro domicilio</label>
                            <input id="numero_dom" name="numero" type="number" class="form-control form-control-sm" min="1" value="<?php echo $row['numero']?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 mb-1">
                            <label for="piso" class="form-label">Piso</label>
                            <input id="piso" name="piso" type="number" class="form-control form-control-sm" min="0" value="<?php echo $row['piso']?>">
                        </div>
                        <div class="col-md-2 mb-1">
                            <label for="depto" class="form-label">Depto</label>
                            <input id="depto" name="departamento" type="text" class="form-control form-control-sm" value="<?php echo $row['departamento']?>">
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="localidad" class="form-label">Localidad</label>
                            <input id="localidad" name="localidad" type="text" class="form-control form-control-sm" required value="<?php echo $row['localidad']?>">
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="provincia" class="form-label">Provincia</label>
                            <input id="provincia" name="provincia" type="text" class="form-control form-control-sm" required value="<?php echo $row['provincia']?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-1">
                            <label for="cod_postal" class="form-label">Código Postal</label>
                            <input id="cod_postal" name="codigoPostal" type="number" class="form-control form-control-sm" min="0" required value="<?php echo $row['codigoPostal']?>">
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="tel" class="form-label">Teléfono</label>
                            <input id="tel" name="telefono" type="tel" class="form-control form-control-sm" pattern="\d{10}" value="<?php echo $row['telefono']?>">
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" name="email" type="email" class="form-control form-control-sm" required value="<?php echo $row['email']?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-1">
                            <label for="CUIT" class="form-label">CUIT</label>
                            <input id="CUIT" name="cuit" type="text" class="form-control form-control-sm" pattern="\d{11}" required value="<?php echo $row['CUIT']?>">
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="condIva" class="form-label">Condición IVA</label>
                            <select name="condicion_id" class="form-control form-control-sm" required>
                            <option value="">Seleccione una opción</option>
                            <option value="1" <?php echo $row['condicion_id'] == '1' ? 'selected' : ''; ?>>Responsable Inscripto</option>
                            <option value="2" <?php echo $row['condicion_id'] == '2' ? 'selected' : ''; ?>>Monotributista</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                        <button type="button" class="btn btn-secondary" onclick="cancelar()">Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
</main>

<script>
  function cancelar(){
    window.location.href= 'listado-clientes.php'
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