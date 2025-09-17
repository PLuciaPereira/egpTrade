<?php
include("conexion.php");

$sql= "SELECT operacionprueba.nroOperacion, operacionprueba.destinacion, operacionprueba.mercaderia, operacionprueba.nroOficializacion, operacionprueba.fechaOficializacion, transporte.nombre as nombreTransporte, digitalizacion.nombre, cliente.nroCliente, cliente.razonSocial FROM operacionprueba INNER JOIN transporte ON operacionprueba.transporte_id = transporte.ID INNER JOIN digitalizacion ON operacionprueba.digitalizacion_id= digitalizacion.ID INNER JOIN cliente ON operacionprueba.cliente_nro = cliente.nroCliente WHERE operacionprueba.ESTADO = 'A'" ;

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

  <title>Listado operaciones</title>
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
<main>
    <section class="section">
        <div class="container-title" style="padding-left: 100px; margin-top: 13px;">
            <h1>Listado de operaciones</h1>
        </div>
        <div class="container-body" style="text-align: center; padding-left: 100px; "> 
            <div class="col-md-8" >
                <table class="table table-hover table-striped text-center" style="font-size: 13px; font-family: Poppins ;white-space: nowrap; border: 5px; box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1); ">
                    <thead>
                        <tr>
                            <th>Nro Operacion</th>
                            <th>Destinacion</th>
                            <th>Mercaderia</th>
                            <th>Nro Oficializacion</th>
                            <th>Fecha Oficializacion</th>
                            <th>Transporte</th>
                            <th>Digitalizacion</th>
                            <th>Nro cliente</th>
                            <th>Razon Social</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php
                            while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                        <tr>
                            <th><?php echo $row['nroOperacion'] ?></th>
                            <th><?php echo $row['destinacion'] ?></th>
                            <th><?php echo $row['mercaderia'] ?></th>
                            <th><?php echo $row['nroOficializacion'] ?></th>
                            <th><?php echo $row['fechaOficializacion'] ?></th>
                            <th><?php echo $row['nombreTransporte'] ?></th>
                            <th><?php echo $row['nombre'] ?></th>
                            <th><?php echo $row['nroCliente'] ?></th>
                            <th><?php echo $row['razonSocial'] ?></th>
                        
                            <th><a href="updateFormOp.php?id=<?php echo $row['nroOperacion'] ?>" class="btn btn-light" style="font-size: 13px; font-family: Poppins">Modificar</a></th>
                            <th><a href="#" data-bs-toggle="modal" data-bs-target= "#modalAdvertencia<?php echo $row['nroOperacion'] ?>" class="btn btn-danger" style="font-size: 13px; font-family: Poppins">Eliminar</a></th>
                        </tr> 
                        <?php include ('modal-eliminarOp.php'); ?>
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