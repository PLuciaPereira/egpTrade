<?php  
   session_start();
   include("session_control.php");
   $datos = $_SESSION['datos'] ?? [];

   if (!isset($_GET['operacionExiste']) && isset($_SESSION['datos'])) {
    unset($_SESSION['datos']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Operaciones</title>

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="assets/img/icono.webp" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
  <?php
    include('conexion.php'); 
    
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $consulta = "SELECT * FROM cliente WHERE nroCliente='$id'";
      $query = mysqli_query($conexion, $consulta);
  }



  ?> 
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="" alt="">
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
      </li>

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
      
      <li id="perfil-login" class="nav-item">
        <a class="nav-link collapsed" href="login.php">
          <i class="bi bi-box-arrow-in-left"></i>
          <span>Salir</span>
        </a>
      </li>

    </ul>

  </aside>

  <main id="main">
    <section class="section">
      <form class="formOP" action="altaOperacion.php" method="POST" id="form-operaciones">
          <div class="container">
              <div class="container-title" style=" margin-top: 40px; margin-bottom: 40px">
                  <h1>Alta de Operaciones</h1>
              </div>
              <div class="container-body">
              <div class="row">
                      <div class="col-md-3 mb-4">
                          <label for="clientes" class="form-label">Cliente</label>
                          <select name="cliente_nro" id="clientes" class="form-control" required>
                            <option value="">Seleccione una opción</option>
                            <?php
                                $clientes = "SELECT * FROM cliente ";
                                $clientesResul = mysqli_query($conexion, $clientes);
                                while($reg = $clientesResul->fetch_assoc()) {
                                  $selected = "";
                                  if (isset($datos['cliente_nro']) && $datos['cliente_nro'] == $reg['nroCliente']) {
                                      $selected = "selected";
                                  } elseif (isset($_GET['id']) && $_GET['id'] == $reg['nroCliente']) {
                                      $selected = "selected";
                                  }
                                    echo "<option value='" . $reg['nroCliente'] . "' $selected>" . $reg['razonSocial'] . "</option>";
                                }
                            ?>

                          </select>
                      </div>
                  <div class="row">
                      <div class="col-md-3 mb-4">
                          <label for="buscar-destinacion" class="form-label">Destinacion</label>
                          <select id='buscar-destinacion' name="destinacion" class="form-control" required>
                            <option  value="">Seleccione una opción</option>
                            <?php
                                $dest="SELECT codigo, descripcion FROM destinacion";
                                $result=mysqli_query($conexion,$dest);
                              
                              while ($row = $result->fetch_assoc()) {
                                $selected = '';
                                  if (isset($datos['destinacion']) && $datos['destinacion'] == $row['codigo']) {
                                      $selected = "selected";
                                  }
                                  echo "<option value='" . $row['codigo'] . "' $selected>" . $row['codigo'] . " - " . $row['descripcion'] . "</option>";
                              }
                            ?>
                        </select>
                      </div>
                      <div class="col-md-3 mb-4">
                          <label for="buscar-mercaderia" class="form-label">Mercaderia</label>
                          <select id='buscar-mercaderia' name="mercaderia" class="form-control" required>
                            <option value="">Seleccione una opcion</option>
                            <?php
                                $mercaderia="SELECT codigo,nombre FROM mercaderia WHERE ESTADO='A'";
                                $resultado=mysqli_query($conexion,$mercaderia);
                                while ($fila = $resultado->fetch_assoc()) {
                                  $selected = '';
                                  if (isset($datos['mercaderia']) && $datos['mercaderia'] == $fila['codigo']) {
                                      $selected = "selected";
                                  }
                                  echo "<option value='" . $fila['codigo'] . "' $selected>" . $fila['nombre'] . "</option>";
                            }                          
                            ?>
                          </select>
                      </div>
                      <div class="col-md-3 mb-3">
                          <label for="buscar-transporte" class="form-label">Transporte</label>
                          <select id="buscar-transporte" name="transporte_id" class="form-control" style="font-size: 20px;" required>
                              <option value="">Seleccione una opcion</option>
                              <option value="1" <?= (isset($datos['transporte_id']) && $datos['transporte_id']) == '1' ? 'selected' : ''?>>Avion</option>
                              <option value="2" <?= (isset($datos['transporte_id']) && $datos['transporte_id']) == '2' ? 'selected' : ''?>>Barco</option>
                              <option value="3" <?= (isset($datos['transporte_id']) && $datos['transporte_id']) == '3' ? 'selected' : ''?>>Tren</option>
                              <option value="4" <?= (isset($datos['transporte_id']) && $datos['transporte_id']) == '4' ? 'selected' : ''?>>Camion</option>
                          </select>
                      </div>
                      <div class="col-md-3 mb-3">
                          <label for="buscar-dig" class="form-label">Digitalizacion</label>
                          <select id="buscar-dig" name="digitalizacion_id" class="form-control" required>
                              <option value="">Seleccione una opcion</option>
                              <option value="1" <?= (isset($datos['digitalizacion_id']) && $datos['digitalizacion_id']) == '1' ? 'selected' : ''?>>Lakaut</option>
                              <option value="2" <?= (isset($datos['digitalizacion_id']) && $datos['digitalizacion_id']) == '2' ? 'selected' : ''?>>Modoc</option>
                              <option value="3" <?= (isset($datos['digitalizacion_id']) && $datos['digitalizacion_id']) == '3' ? 'selected' : ''?>>Digex</option>
                          </select>
                      </div>
                  <div class="row">
                      <div class="col-md-4 mb-3">
                          <label for="fechaOfi" class="form-label">Fecha Oficializacion</label>
                          <input name="fechaOficializacion" id="fechaOfi" type="date" value="<?= htmlspecialchars($datos['fechaOficializacion'] ?? '') ?>" class="form-control form-control-sm " required>
                      </div>
                      <div class="col-md-4 mb-3">
                          <label for="numOficializacion" class="form-label">Nro Oficializacion</label>
                          <input name="nroOficializacion" id="numOficializacion" type="text" placeholder="Ej 25052EC01000789Y" minlength="16" maxlength="20" value="<?= htmlspecialchars($datos['nroOficializacion'] ?? '') ?>" class="form-control form-control-sm" required pattern="[A-Za-z0-9]+" oninput="this.value = this.value.replace(/[^A-Za-z0-9]/g, '')"/>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4 mb-3">
                          <label for="proveedor" class="form-label">Proveedor/Vendedor extranjero</label>
                          <input name="prov" id="proveedor" type="text" placeholder="Ej: Los chinos SRL" value="<?= htmlspecialchars($datos['prov'] ?? '') ?>" class="form-control form-control-sm">
                      </div>
                      <div class="col-md-4 mb-3">
                          <label for="idTributario" class="form-label">ID tributario</label>
                          <input name="idT" id="idTributario" type="text" maxlength="11" minlength="11" pattern="\d{11}" inputmode="numeric" placeholder="Ej: 30712024455" value="<?= htmlspecialchars($datos['idT'] ?? '') ?>" class="form-control form-control-sm" oninput="this.value = this.value.replace(/\D/g, '')">
                      </div>
                  </div>
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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
      window.location.href= 'index.php'
    }
  </script>
  <!-- Vendor JS Files -->
  <!-- <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
  <script src="assets/vendor/php-email-form/validate.js"></script>


  
  <!-- jQuery + Validations -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

<!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<!-- Archivo de idioma español de Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/es.min.js"></script>


<!-- Tu propio JS -->

<script>
  $(document).ready(function() {
    $('#buscar-destinacion').select2({
        placeholder: "Seleccione una opcion",
        allowClear: true,
        width: '100%',
        language: "es"
    });
    $('#buscar-mercaderia').select2({
        placeholder: "Seleccione una opcion",
        allowClear: true,
        width: '100%',
        language: "es"
    });
    $('#buscar-transporte').select2({
        placeholder: "Seleccione una opcion",
        allowClear: true,
        width: '100%',
        language: "es"
    });
    $('#buscar-dig').select2({
        placeholder: "Seleccione una opcion",
        allowClear: true,
        width: '100%',
        language: "es"
    });
    $('#clientes').select2({
        placeholder: "Seleccione una opcion",
        allowClear: true,
        width: '100%',
        language: "es"
    });
  });
</script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>