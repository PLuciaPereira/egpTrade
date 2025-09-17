<?php   
   session_start();
   include("session_control.php");

    include("conexion.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $consulta = "SELECT * FROM operacion WHERE nroOperacion='$id'";
        $query = mysqli_query($conexion, $consulta);
        $row = mysqli_fetch_array($query);
        $numCliente = $row["cliente_nro"];
    }

    $datos = $_SESSION['datos_modificar'] ?? [];
?>

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Modificar Operacion</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
 
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
  
  <!-- Select2 Bootstrap Theme -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.6.2/dist/select2-bootstrap4.min.css" rel="stylesheet" />

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
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <!-- lupa-->
    <div class="nav-container" style="flex-grow: 1; display: flex; justify-content: flex-end; align-items: center;">
      <a class="nav-link collapsed" href="buscador2.php">
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
            <a href="formularioClientes.php">
              <i class="bi bi-circle"></i><span>Nuevo cliente</span>
            </a>
          </li>
          <li>
            <a href="listadoClientes.php">
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
            <a href="formularioOperaciones.php">
              <i class="bi bi-circle"></i><span>Nueva operacion</span>
            </a>
          </li>
          <li>
            <a href="listadoOperaciones.php">
              <i class="bi bi-circle"></i><span>Ver listado</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav-mercaderia" data-bs-toggle="collapse" href="#">
          <i class="bi bi-boxes"></i><span>Mercaderia</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav-mercaderia" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="formularioMercaderia.php">
              <i class="bi bi-circle"></i><span>Nueva mercaderia</span>
            </a>
          </li>
          <li>
            <a href="listadoMercaderia.php">
              <i class="bi bi-circle"></i><span>Ver listado</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="cotizacion.php">
          <i class="bi bi-calculator"></i>
          <span>Calculadora</span>
        </a>
      </li>

      <li class="nav-heading"><hr></li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="login.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Salir</span>
        </a>
      </li>
    </ul>

  </aside>
  <main id="main" >
    <section class="section">
        <form action="modificar-op.php" method="POST">
            <div class="container">
                <div class="container-title" style=" margin-top: 30px; margin-bottom: 25px">
                    <h1>Modificar operacion</h1>
                </div>
                <div class="container-body">
                    <div class="row">
                    <div class="col-md-4 mb-3">
                            <label for="nroCliente" class="form-label">Nro operacion</label>
                            <input name="nroOperacion" id="nroCliente" class="form-control form-control" value="<?= htmlspecialchars($datos['nroOperacion'] ?? $row['nroOperacion'] ?? '') ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 mb-2">
                            <label for="modif-destinacion" class="form-label">Destinacion</label>
                            <select id='modif-destinacion' name="destinacion" class="form-select form-select-sm" required>
                            <?php
                                $dest = "SELECT codigo, descripcion FROM destinacion";
                                $result = mysqli_query($conexion, $dest);

                                while ($f = $result->fetch_assoc()) {
                                  $selected= '';
                                  if(isset($datos['destinacion']) && $datos['destinacion'] == $f['codigo']){
                                    $selected = 'selected';
                                  }elseif ($f['codigo'] == $row['destinacion']){
                                    $selected = 'selected';
                                  }
                                    echo "<option value='" . $f['codigo'] . "'$selected>" . $f['codigo'] . " - " . $f['descripcion'] . "</option>";
                              }

                            ?>
                        </select>

                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="modif-mercaderia" class="form-label">Mercaderia</label>
                            <select name="mercaderia" id="modif-mercaderia">
                            <?php
                                $mercaderia = "SELECT * FROM mercaderia WHERE estado = 'A'";
                                $resultadoMercaderia = mysqli_query($conexion,$mercaderia);
                                 while ($fila = $resultadoMercaderia->fetch_assoc()) {
                                    $selected = '';
                                    if (isset($datos['mercaderia']) && $datos['mercaderia'] == $fila['codigo']) {
                                        // Prioriza valor del form anterior en caso de error
                                        $selected = 'selected';
                                    } elseif ($fila['codigo'] == $row['mercaderia_id']) {
                                        // Valor cargado desde la BD en la modificación inicial
                                        $selected = 'selected';
                                    }
                                    echo "<option value='" . $fila['codigo'] . "' $selected>" . $fila['nombre'] . "</option>";
                                }

                                ?>
                            </select>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="modif-transporte" class="form-label">Transporte</label>
                            <?php
                              $transporte_actual = $datos['transporte_id'] ?? $row['transporte_id'] ?? '';
                            ?>
                            <select name="transporte_id" id="modif-transporte" class="form-control" required>
                                <option value="">Seleccione una opcion</option>
                                <option value="1" <?= ($transporte_actual == '1') ? 'selected' : ''; ?>>Avion</option>
                                <option value="2" <?= ($transporte_actual == '2') ? 'selected' : ''; ?>>Barco</option>
                                <option value="3" <?= ($transporte_actual == '3') ? 'selected' : ''; ?>>Tren</option>
                                <option value="4" <?= ($transporte_actual == '4') ? 'selected' : ''; ?>>Camion</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="modif-dig" class="form-label">Digitalizacion</label>
                            <?php
                              $digitalizacion_actual = $datos['digitalizacion_id'] ?? $row['digitalizacion_id'] ?? '';
                            ?>

                            <select id="modif-dig" name="digitalizacion_id" class="form-control" required>
                                <option value="">Seleccione una opción</option>
                                <option value="1" <?= ($digitalizacion_actual == '1') ? 'selected' : ''; ?>>Lakaut</option>
                                <option value="2" <?= ($digitalizacion_actual == '2') ? 'selected' : ''; ?>>Modoc</option>
                                <option value="3" <?= ($digitalizacion_actual == '3') ? 'selected' : ''; ?>>Digex</option>
                            </select>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="fecha_of" class="form-label">Fecha Oficializacion</label>
                            <input name="fechaOficializacion" id="fecha_of" type="date" class="form-control" value="<?= htmlspecialchars($datos['fechaOficializacion'] ?? $row['fechaOficializacion'] ?? '')?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="num_oficializacion" class="form-label">Nro Oficializacion</label>
                            <input name="nroOficializacion" id="num_oficializacion" type="text" class="form-control" value="<?= htmlspecialchars($datos['nroOficializacion'] ?? $row['nroOficializacion'] ?? '')?>">
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 mb-3">
                          <label for="proveedor" class="form-label">Proveedor/Vendedor extranjero</label>
                          <input name="prov" id="proveedor" type="text" class="form-control form-control-sm" value="<?= htmlspecialchars($datos['prov'] ?? $row['provExtranjero'] ?? '')?>">
                      </div>
                      <div class="col-md-4 mb-3">
                          <label for="idTributario" class="form-label">ID tributario</label>
                          <input name="idT" id="idTributario" type="text" class="form-control form-control-sm" value="<?= htmlspecialchars($datos['idT'] ?? $row['idTributario'] ?? '')?>">
                      </div>
                  </div>
                    <div class="row">
                        <div class="col-md-2 mb-2">
                            <label for="nro_cliente" class="form-label">Nro cliente</label>
                            <input name="cliente_nro" id="nro_cliente" type="number" class="form-control" value="<?php echo $row['cliente_nro']?>" readonly>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="cliente" class="form-label">Cliente</label>
                            <?php                                
                                $nombreCliente = "SELECT razonSocial from cliente where nroCliente = $numCliente";
                                $resultado= mysqli_query($conexion,$nombreCliente);

                                $registro = $resultado -> fetch_assoc(); 
                            ?>
                            <input id="cliente" name="cliente" type="text" class="form-control" value="<?php echo $registro['razonSocial']?>" readonly>
                        </div>
                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                        <button type="button" class="btn btn-secondary me-2" onclick="cancelar()">Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Modal genérico para mostrar mensajes -->
<div class="modal fade" id="modalMensaje" tabindex="-1" aria-labelledby="modalMensajeLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="modalMensajeLabel">Error</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body" id="modalMensajeBody">
        <!-- El mensaje se inserta desde JavaScript -->
      </div>
        <div class="modal-footer" >
            <form action="updateFormOp.php" method="GET">
              <input type="hidden" name="id" value="<?= htmlspecialchars($_GET['id']) ?>">
              <button type="submit" class="btn btn-primary">Cerrar</button>
            </form>

        </div>
        </div>
    </div>
</div> 
<script>
function mostrarModalConMensaje(mensaje) {
    const body = document.getElementById('modalMensajeBody');
    body.textContent = mensaje;

    const modal = new bootstrap.Modal(document.getElementById('modalMensaje'));
    modal.show();
}
</script>

<?php if (isset($_GET['campoRepetido'])): ?>
<script>
    mostrarModalConMensaje("El <?= htmlspecialchars($_GET['campoRepetido']) ?> ingresado ya existe.");
</script>
<?php endif; ?>

<script>
  function cancelar(){
    window.location.href= 'listadoOperaciones.php'
  }
</script>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
  
  <!-- jQuery + Validations -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<!-- Tu propio JS -->
<script>
  $(document).ready(function () {
    console.log("Select2 test directo");
    $('#modif-mercaderia').select2({
        placeholder: "Seleccione una opcion",
        allowClear: true,
        width: '100%',
        language: "es"
    });
    $('#modif-transporte').select2({
        placeholder: "Seleccione una opcion",
        allowClear: true,
        width: '100%',
        language: "es"
    });

  $('#modif-dig').select2({
          placeholder: "Seleccione una opcion",
          allowClear: true,
          width: '100%',
          language: "es"
      });
      $('#modif-destinacion').select2({
          placeholder: "Seleccione una opcion",
          allowClear: true,
          width: '100%',
          language: "es"
      });
});

</script>

</body>
</html>