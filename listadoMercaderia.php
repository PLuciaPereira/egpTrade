<?php

include("conexion.php");
include("session_control.php");
$sql="SELECT mercaderia.codigo, mercaderia.nombre, 
            paisOrigen.nombre as 'paisOrigen', 
            paisProc.nombre as 'paisProc', 
            descripcion 
        FROM mercaderia
        INNER JOIN paises as paisOrigen ON mercaderia.origen = paisOrigen.codigo
        INNER JOIN paises as paisProc ON mercaderia.procedencia = paisProc.codigo WHERE ESTADO = 'A' order by mercaderia.codigo" ;

$query= mysqli_query($conexion,$sql);

if (!$query) {
    die("Error en la consulta SQL: " . mysqli_error($conexion));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Listado mercaderia</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- icono ventana -->
  <link href="assets/img/icono.webp" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">EGP Trade</span>
      </a>
    </div>

    <!-- lupa-->
    <div class="nav-container" style="flex-grow: 1; display: flex; justify-content: flex-end; align-items: center;">
      <a class="nav-link collapsed" href="buscador2.php">
        <i class="bi bi-search" id="lupa" style="font-size: 1.2rem; margin-right: 20px; color: #333;"></i>
      </a>
    </div>

  </header>

  <main class="main">
    <section class="section">
      <div class="container-title" style="padding-left: 200px; margin-top: 90px;">
          <h1>Listado de mercaderia</h1>
      </div>
      <div class="container-body" style="text-align: center; padding-left: 200px; "> 
          <div class="col-md-8" >
              <table class="table table-hover table-striped text-center" style="font-size: 14px; font-family: Poppins; white-space: nowrap; border: 5px; box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);">
                  <thead class="thead-dark">
                      <tr>
                          <th scope="col">Nro Mercaderia</th>
                          <th scope="col">Mercaderia</th>
                          <th scope="col">Pais de origen</th>
                          <th scope="col">Pais de procedencia</th>
                          <th scope="col">Descripcion</th>
                          <th></th>
                          <th></th>
                      </tr>
                  </thead>
                  <tbody> 
                      <?php
                          while ($row = mysqli_fetch_assoc($query)) {
                      ?>
                      <tr>
                          <th><?php echo $row['codigo'] ?></th>
                          <td><?php echo $row['nombre'] ?></td>
                          <td><?php echo $row['paisOrigen'] ?></td>
                          <td><?php echo $row['paisProc'] ?></td>
                          <td><?php echo $row['descripcion'] ?></td>
                          
                      
                          <td><a href="updateFormMerc.php?id=<?php echo $row['codigo'] ?>" class="btn btn-warning btn-sm" style="font-size: 13px;"><i class="bi bi-pencil-square"></i></a></td>
                          <td><a href="#" data-bs-toggle="modal" data-bs-target= "#modalAdvertencia<?php echo $row['codigo'] ?>" class="btn btn-danger btn-sm" style="font-size: 13px;"><i class="bi bi-trash3"></i></a></td>
                      </tr> 
                      <?php include ('modal-eliminarMerc.php'); ?>
                      <?php } ?>
                  </tbody>
              </table>
          </div>
      </div>
  </section>
</main>

<a href="index.php" style="
    position: fixed; 
    bottom: 20px; 
    left: 20px; 
    width: 50px; 
    height: 50px; 
    background-color: #012970; 
    color: white; 
    border-radius: 20%; 
    display: flex; 
    align-items: center; 
    justify-content: center; 
    font-size: 24px; 
    text-decoration: none; 
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); 
    z-index: 1000; 
    transition: background-color 0.3s ease;" 
    onmouseover="this.style.backgroundColor='#0056b3'" 
    onmouseout="this.style.backgroundColor='#007bff'">
    <i class="bi bi-arrow-left-short"></i>
</a>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>