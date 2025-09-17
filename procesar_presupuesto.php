<?php
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $resultado_gravamenes = (float)($_POST['res_gravamenes'] ?? 0);  
    $resultado_sinH = (float)($_POST['res_sinH'] ?? 0);
    $resultado_conH = (float)($_POST['res_conH'] ??  0);

    $fob =(float)($_POST['res_fob'] ?? 0);  
    $flete =(float)($_POST['res_flete'] ?? 0);
    $seguro =(float)($_POST['res_seguro'] ?? 0);
  
    $cif = (float)($_POST['res_cif']?? 0);
    $derechos =(float) ($_POST['res_derechos']?? 0);
    $estadistica = (float)($_POST['res_estadistica']?? 0);
    $baseIVA = (float)($_POST['res_base_iva']?? 0);
    $iva =(float) ($_POST['res_iva']?? 0);
    $ivaAdic =(float) ($_POST['res_iva_adic']?? 0);
    $ganancia = (float)($_POST['res_ganancia']?? 0);
    $ib = (float)($_POST['res_ib']?? 0);
    $arancel =(float) ($_POST['res_arancel']?? 0);


    $honorario = (float)($_POST['honorario'] ??  0);
    $gasto_op = (float)($_POST['gasto_op'] ??  0);
    $senasa = (float)($_POST['senasa'] ??  0);
    $dig = (float) ($_POST['dig'] ??  0);



} 


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Cotizacion</title>
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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
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
      </li>
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
        <form class="form" id="form" method="post" action="presupuesto.php">
            <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
                <div class="card bg-light shadow-sm p-4" style="max-width: 500px; width: 100%;">
                    <h5 class="fw-semibold mb-4 text-center">Nuevo presupuesto</h5>
                     <div class="mb-3">
                        <input type="hidden" name="res_gravamenes" id="gravamenes" value="<?php echo $resultado_gravamenes?>" class="form-control form-control-sm" required>
                        <input type="hidden" name="res_sinH" id="sinH" value="<?php echo $resultado_sinH?>" class="form-control form-control-sm" required>
                        <input type="hidden" name="res_conH" id="conH" value="<?php echo $resultado_conH?>" class="form-control form-control-sm" required>
                        <input type="hidden" name="honorario" id="honorarios" value="<?php echo $honorario?>" class="form-control form-control-sm" required>
                        <input type="hidden" name="gasto_op" id="gasto_op" value="<?php echo $gasto_op?>" class="form-control form-control-sm" required>
                        <input type="hidden" name="senasa" id="senasa" value="<?php echo $senasa?>" class="form-control form-control-sm" required>
                        <input type="hidden" name="dig" id="dig" value="<?php echo $dig?>" class="form-control form-control-sm" required>
                        <input type="hidden" name="res_fob" id="fob" value="<?php echo $fob?>" class="form-control form-control-sm" required>
                        <input type="hidden" name="res_flete" id="flete" value="<?php echo $flete?>" class="form-control form-control-sm" required>
                        <input type="hidden" name="res_seguro" id="seguro" value="<?php echo $seguro?>" class="form-control form-control-sm" required>
                        <input type="hidden" name="res_iva" id="iva" value="<?php echo $iva?>" class="form-control form-control-sm" required>
                        <input type="hidden" name="res_iva_adic" id="ivaAD" value="<?php echo $ivaAdic?>" class="form-control form-control-sm" required>
                        <input type="hidden" name="res_ganancia" id="ganancia" value="<?php echo $ganancia?>" class="form-control form-control-sm" required>
                        <input type="hidden" name="res_ib" id="ingBr" value="<?php echo $ib?>" class="form-control form-control-sm" required>
                        <input type="hidden" name="res_arancel" id="arancel_sim" value="<?php echo $arancel?>" class="form-control form-control-sm" required>
                        <input type="hidden" name="res_derechos" id="porcentaje_derechos" value="<?php echo $derechos?>" class="form-control form-control-sm" required>
                        <input type="hidden" name="res_estadistica" id="porcentaje_estadistica" value="<?php echo $estadistica?>" class="form-control form-control-sm" required>
                        <input type="hidden" name="res_cif" id="cif" value="<?php echo $cif?>" class="form-control form-control-sm" required>
                        <input type="hidden" name="res_base_iva" id="base_iva" value="<?php echo $baseIVA?>" class="form-control form-control-sm" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha</label>
                        <input type="text" name="fecha" class="form-control" value="<?php echo date('d/m/y'); ?>" required readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cliente</label>
                        <input type="text" name="cliente" class="form-control form-control-sm" placeholder="Nombre del cliente" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Teléfono</label>
                        <input type="text" name="telefono"pattern="\d{10}" inputmode="numeric" maxlength="10"  placeholder="Ej: 3416070629" value="<?= htmlspecialchars($datos['telefono'] ?? '') ?>" class="form-control form-control-sm" required oninput="this.value = this.value.replace(/\D/g, '')" class="form-control form-control-sm" placeholder="Ej: 3416970640" maxlength="15">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control form-control-sm" placeholder="cliente@correo.com">
                    </div>
                    <div class="mb-3">
                            <label for="observaciones" class="form-label">Observaciones</label><br>
                            <textarea name="obs" id="observaciones" rows="3" cols="50"></textarea>
                        </div>
                

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary me-2">Generar presupuesto</button>
                        <button type="button" class="btn btn-secondary" onclick="cancelar()">Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
</main>

<script src="assets/js/cotizacion.js"></script>
 
</body>
</html>
<script>
  function cancelar(){
    window.location.href= 'cotizacion.php'
  }
</script>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
  
</body>
</html>