<?php   
   session_start();
   include("session_control.php");

    // $_SESSION['pagina_actual'] = 'updateForm'; // Indica en qué página estoy
    include("conexion.php");

    if (isset($_GET['id'])) {
        $id= $_GET['id'];
        $consulta = "SELECT * FROM cliente WHERE nroCliente='$id'";
        $query= mysqli_query($conexion,$consulta);

        $row = mysqli_fetch_array($query);
        
    }

    $datos = $_SESSION['datos_modificar'] ?? [];
?>
<!DOCTYPE html>
<html lang="en"> 

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Modificar Cliente</title>
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

  <?php
    include("conexion.php");
    
    
  ?>
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
      </li><!-- End Forms Nav -->
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
  <main id="main">
    <section class="section">
        <form class="form" action="modificar-cliente.php" method="POST"> 
            <div class="container">
                <div class="container-title" style=" margin-top: 25px; margin-bottom: 25px">
                    <h1>Modificar Cliente</h1>
                </div>
                <div class="container-body">
                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <label for="nroCliente" class="form-label">Nro Cliente</label>
                            <input id="nroCliente" name="nroCliente"  class="form-control form-control-sm" value="<?= $row['nroCliente'] ?? ''; ?>" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="razon_social" class="form-label">Razón Social</label>
                            <input id="razon_social" name="razonSocial" type="text" class="form-control form-control-sm" value="<?= htmlspecialchars($datos['razonSocial'] ?? $row['razonSocial'] ?? '') ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="dom_fiscal" class="form-label">Domicilio Fiscal</label>
                            <input id="dom_fiscal" name="domicilioFiscal" type="text" pattern="(?=.*[a-zA-Z])(?=.*\d).{5,}" class="form-control form-control-sm" required value="<?= htmlspecialchars($datos['domicilioFiscal'] ?? $row['domicilioFiscal'] ?? '')?>">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="piso" class="form-label">Piso</label>
                            <input id="piso" name="piso" type="text" maxlength="5" class="form-control form-control-sm" value="<?=htmlspecialchars($datos['piso'] ?? $row['piso'] ?? '')?>">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="depto" class="form-label">Depto</label>
                            <input id="depto" name="departamento" type="text" maxlength="5" class="form-control form-control-sm" value="<?= htmlspecialchars($datos['departamento'] ?? $row['departamento'] ?? '')?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="localidad" class="form-label">Localidad</label>
                            <input id="localidad" name="localidad" type="text" class="form-control form-control-sm" required value="<?= htmlspecialchars($datos['localidad'] ?? $row['localidad'] ?? '')?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="provincia" class="form-label">Provincia</label>
                            <input id="provincia" name="provincia" type="text" class="form-control form-control-sm" required  value="<?= htmlspecialchars($datos['provincia'] ?? $row['provincia'] ?? '')?>">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="cod_postal" class="form-label">Código Postal</label>
                            <input id="cod_postal" name="codigoPostal" type="text" pattern="\d{4,5}" inputmode="numeric" maxlength="5" class="form-control form-control-sm" min="0" required oninput="this.value = this.value.replace(/\D/g, '')" value="<?= htmlspecialchars($datos['codigoPostal'] ?? $row['codigoPostal'] ?? '')?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="tel" class="form-label">Teléfono</label>
                            <input id="tel" name="telefono" type="text" pattern="\d{10}" inputmode="numeric" maxlength="10" class="form-control form-control-sm" required oninput="this.value = this.value.replace(/\D/g, '')" value="<?= htmlspecialchars($datos['telefono'] ?? $row['telefono'] ?? '')?>"><small class="form-text text-muted">Ingresar sin 0 ni 15.</small>
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" name="email" type="email" class="form-control form-control-sm" required value="<?= htmlspecialchars($datos['email'] ?? $row['email'] ?? '')?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="CUIT" class="form-label">CUIT</label>
                            <input id="CUIT" name="cuit" type="text" maxlength="11" minlength="11" pattern="\d{11}" inputmode="numeric" class="form-control form-control-sm"  required oninput="this.value = this.value.replace(/\D/g, '')" value="<?= htmlspecialchars($datos['cuit'] ?? $row['CUIT'] ?? '')?>"><small class="form-text text-muted">Ingresar sin espacios ni guiones.</small>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="condIva" class="form-label">Condición IVA</label>
                            <select name="condicion_id" id="modif-condIva" class="form-control form-control-sm" required>
                            <?php
                              $condicionIva = "SELECT * FROM condicioniva";
                              $resulCond = mysqli_query($conexion,$condicionIva);
                              
                              while($resul = $resulCond -> fetch_assoc()){
                                $selected= '';
                                if(isset($datos['condicion_id']) && $datos['condicion_id'] == $resul['ID']){
                                    $selected = 'selected';
                                  }elseif ($resul['ID'] == $row['condicion_id']){
                                    $selected = 'selected';
                                  }
                                echo "<option value='" . $resul['ID'] . "' $selected>" . $resul['nombre'] . "</option>";
                              }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                        <button type="button" class="btn btn-secondary" onclick="cancelar()">Cancelar</button>
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
    window.location.href= 'listadoClientes.php'
  }
</script>


 
<!-- Vendor JS Files -->
<!-- <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
  
  <!-- jQuery + Validations -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<!-- Archivo de idioma español de Select2 -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/es.min.js"></script> -->


<script>
  $(document).ready(function () {
    console.log("Select2 test directo");
    $('#modif-condIva').select2({
        placeholder: "Seleccione una opcion",
        allowClear: true,
        width: '100%',
        language: "es"
    });
    });
</script>
</body>

</html>





