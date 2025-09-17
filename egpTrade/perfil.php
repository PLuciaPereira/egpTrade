<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Perfil</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

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
  
     
    </header><!-- End Header -->
  
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
          </li><!-- End Components Nav -->

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

  <main  class="main">
 
    <section class="sectionPerfil">
      <div class="container">
        <div class="container-title">
          <h1>Perfil</h1>
        </div>
          <div class="col-xl-25">
          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#datos-perfil">Datos</button>
                </li>
              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="datos-perfil">
                  <h5 class="card-title">Datos personales</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nombre completo</div>
                    <div class="col-lg-9 col-md-8">Eduardo German Pereira</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Razon social</div>
                    <div class="col-lg-9 col-md-8">EGP Comercio Exterior</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">DNI</div>
                    <div class="col-lg-9 col-md-8">21629784</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country</div>
                    <div class="col-lg-9 col-md-8">USA</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8">A108 Adam Street, New York, NY 535022</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8">(436) 486-3538 x29071</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">eduardo@epereira.com.ar</div>
                  </div>

                </div>
              </div><!-- End Bordered Tabs -->

            </div>
          </div>
        </div>
        </div>
    </section>

  </main>

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