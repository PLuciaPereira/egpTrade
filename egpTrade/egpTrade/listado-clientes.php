<?php
include("conexion.php");
$sql= "SELECT nroCliente, razonSocial, domicilioFiscal, numero,piso, departamento, localidad, provincia, codigoPostal, telefono, email, CUIT, condicioniva.nombre AS condicionIVA_nombre FROM clienteprueba INNER JOIN condicioniva on condicion_id = condicioniva.ID WHERE ESTADO= 'A'";
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


  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<main>
    <section class="section">
        <div class="container-title" style="padding-left: 100px; margin-top: 13px;">
            <h1>Listado de clientes</h1>
        </div>
        <div class="container-body" style="padding-left: 100px; text-align: center;" > 
            <div class="col-md-8" >
                <table class="table table-hover table-striped text-center" style="font-size: 14px; font-family: Poppins; white-space: nowrap; border: 5px; box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);">
                    <thead>
                        <tr>
                            <th><span>Nro Cliente</span></th>
                            <th>Razón Social</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody> 
                    <?php
                        while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                        
                        <tr>
                            <th><?php echo $row['nroCliente']?></th>
                            <th><?php echo $row['razonSocial'] ?></th>
                            <th><a href="#" class="btn-detalles" data-id="<?php echo $row['nroCliente']; ?>" data-bs-toggle="modal" data-bs-target="#miModal">Ver detalles</a></th>
                            <th><a href="updateForm.php?id=<?php echo $row['nroCliente'] ?>" class="btn btn-light" style="font-size: 14px; font-family: Poppins">Modificar</a></th>
                            <th><a href="formOperaciones.php?id=<?php echo $row['nroCliente'] ?>" class="btn btn-light" style="font-size: 14px; font-family: Poppins">Nueva operacion</a></th>
                            <th><a href="#" data-bs-toggle="modal" data-bs-target="#modalAdvertencia<?php echo $row['nroCliente']?>" class="btn btn-danger" style="font-size: 14px; font-family: Poppins">Eliminar</a></th> 
                        </tr> 
                        <?php 
                            include ('modal-eliminar.php');
                        ?>
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
                <table class="table table-bordered" style=" font-size:13px; font-family: Poppins; white-space: nowrap; border: 5px; box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);">
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
                    <th>Número</th>
                    <td><?php echo $row['numero'] ?></td>
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


  <!-- <script> 
    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => { 
        myInput.focus()
    })
</script> -->
</body>

</html>
