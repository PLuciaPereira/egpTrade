<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&display=swap" rel="stylesheet">

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
include ("validar.php")
?>
  <main style="font-family:Poppins; font-weight: 200;">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4" style=" background:url('assets/img/fondo.jpg'); background-size: cover; background-position: center;">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 d-flex flex-column align-items-center justify-content-center">
              
              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4" style="font-family:Poppins; font-weight: 200;">Iniciar Sesion</h5>
                  </div>

                  <form action="validar.php" method="post" class="row g-3">

                    <div class="col-12">
                      <div class="input-group">
                      <span class="input-group-text" id=""><i class="bi bi-person"></i></span>
                        <input type="text" name="usuario" class="form-control" id="yourUsername" placeholder="Nombre de usuario">
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="input-group">
                      <span class="input-group-text" id=""><i class="bi bi-lock"></i></span>
                        <input type="password" name="contraseña" class="form-control" id="yourPassword" placeholder="Contraseña">
                      </div>
                    </div>

                    </div>
                    <div class="col-12 py-3 text-center" >
                      <button class="btn btn-dark " type="submit">Iniciar sesion</button>
                    </div>
                   
                  </form>

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