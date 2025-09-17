<?php
include("conexion.php");
include("session_control.php");
$sql= "SELECT nroCliente, razonSocial, domicilioFiscal, piso, departamento, localidad, provincia, codigoPostal, telefono, email, CUIT, condicioniva.nombre AS condicionIVA_nombre FROM cliente INNER JOIN condicioniva on condicion_id = condicioniva.ID WHERE ESTADO= 'A'";
$query= mysqli_query($conexion,$sql);

?> 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Listado Clientes</title>
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
      <div class="container-title" style="padding-left: 25%; margin-top: 90px;">
          <h1>Listado de clientes</h1>
      </div>
      <div class="container-body" style="padding-left: 25%; text-align: center;" > 
          <div class="col-md-8" >
          <table class="table table-hover table-striped text-center" style="font-size: 14px; font-family: Poppins; white-space: nowrap; border: 5px; box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Nro Cliente</th>
                <th scope="col">Razón Social</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody> 
              <?php while ($row = mysqli_fetch_assoc($query)) { ?>
              <tr>
                <th scope="row"><?php echo $row['nroCliente']?></th>
                <td><?php echo $row['razonSocial'] ?></td>
                <td>
                  <a href="#" class="btn btn-info btn-sm btn-detalles" data-id="<?php echo $row['nroCliente']; ?>" data-bs-toggle="modal" data-bs-target="#miModal" style="font-size: 13px;">Ver detalles</a>
                </td>
                <td>
                  <a href="formularioOperaciones.php?id=<?php echo $row['nroCliente'] ?>" class="btn btn-success btn-sm" style="font-size: 13px;">Nueva operación</a>
                </td>
                <td>
                  <a href="updateForm.php?id=<?php echo $row['nroCliente'] ?>" class="btn btn-warning btn-sm" style="font-size: 13px;"><i class="bi bi-pencil-square"></i></a>
                </td>
                <td>
                  <a href="#" data-bs-toggle="modal" data-bs-target="#modalAdvertencia<?php echo $row['nroCliente']?>" class="btn btn-danger btn-sm" style="font-size: 13px;"><i class="bi bi-trash3"></i></a>
                </td>
              </tr> 
              <?php include ('modal-eliminar.php'); ?>
              <?php } ?>
            </tbody>
          </table>

          </div>
      </div>
      <div class="modal fade" id="miModal" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title">Datos del cliente</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
          <div class="modal-body">
              <table class="table table-bordered" style=" font-size:13px; font-family: 'Poppins'; white-space: nowrap; border: 5px; box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);">
              <tbody>
                  <tr>
                    <th>Nro Cliente</th>
                    <td><?php echo $row['nroCliente'] ?></td>
                  </tr>
                  <tr>
                    <th>Razón Social</th>
                    <td><?php echo $row['razonSocial'] ?></td>
                  </tr>
                  <tr>
                    <th>Domicilio Fiscal</th>
                    <td><?php echo $row['domicilioFiscal'] ?></td>
                  </tr>

                  <tr>
                    <th>Piso</th>
                    <td><?php echo $row['piso'] ?></td>
                  </tr>
                  <tr>
                    <th>Departamento</th>
                    <td><?php echo $row['departamento'] ?></td>
                  </tr>
                  <tr>
                    <th>Localidad</th>
                    <td><?php echo $row['localidad'] ?></td>
                  </tr>
                  <tr>
                    <th>Provincia</th>
                    <td><?php echo $row['provincia'] ?></td>
                  </tr>
                  <tr>
                    <th>Código Postal</th>
                    <td><?php echo $row['codigoPostal'] ?></td>
                  </tr>
                  <tr>
                    <th>Teléfono</th>
                    <td><?php echo $row['telefono'] ?></td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <td><?php echo $row['email'] ?></td>
                  </tr>
                  <tr>
                    <th>CUIT</th>
                    <td><?php echo $row['CUIT'] ?></td>
                  </tr>
                  <tr>
                    <th>Condición IVA</th>
                    <td><?php echo $row['condicionIVA_nombre'] ?></td>
                  </tr>
              </tbody>
              </table>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
          </div>
      </div>
      </div>
          
  </section>
</main>

<script>
  document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".btn-detalles").forEach((boton) => {
      boton.addEventListener("click", () => {
          const clienteId = boton.dataset.id;

          fetch(`obtenerClientes.php?id=${clienteId}`)
              .then((response) => response.text())
              .then((html) => {
                  document.querySelector("#miModal .modal-body").innerHTML = html;
              })
              .catch(() => {
                  document.querySelector("#miModal .modal-body").innerHTML = '<p>Error al cargar los datos del cliente.</p>';
              });
      });
  });
});

</script>


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