<?php

include("session_control.php");
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
<style>
  .warning {
    color: red;
    font-size: 0.8em;
}

</style>
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
        <form class="form" id="form" method="post" action="procesar_presupuesto.php" onsubmit="return prepararEnvio()">
            <div class="container">
              <div class="card bg-light shadow-sm p-4" style="margin-top: 10px;">
                <h5 class="fw-semibold mb-3" >Calculadora Integral de Operaciones</h5>
                <div class="row">
                  <div class="col-md-3 mb-3">
                    <label class="form-label">FOB</label>
                    <div class="input-group">
                      <input type="hidden" name="fob" id="res_fob">
                      <input type="number" id="fob" name="fob" class="form-control form-control-sm">
                      <span class="input-group-text">USD</span>
                    </div>
                    <small id="fob_warning" class="warning"></small>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label class="form-label">Flete</label>
                    <div class="input-group">
                      <input type="number" id="flete" name="flete" class="form-control form-control-sm">
                      <span class="input-group-text">USD</span>
                    </div>
                    <small id="flete_warning" class="warning"></small>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label class="form-label">Seguro</label>
                    <div class="input-group">
                      <input type="number" id='seguro' name="seguro" class="form-control form-control-sm">
                      <span class="input-group-text">USD</span>
                    </div>
                    <small id="seguro_warning" class="warning"></small>
                  </div>
                    <div class="row">    
                        <div class="col-md-4 mb-3">
                            <div id='resultado'></div>
                        </div>
                    </div>
                    <div class="row">    
                      <div class="col-md-3 mb-3">
                        <label class="form-label">Derechos de importacion</label>
                        <div class="input-group">
                          <input type="number" id='porcentaje_derechos' name="derechos" class="form-control">
                          <span class="input-group-text">%</span>
                        </div>
                        <small id="porcentaje_derechos_warning" class="warning"></small>
                      </div>
                        <div class="col-md-3 mb-3">
                          <label class="form-label">Tasa de estadistica</label>
                          <div class="input-group">
                            <input type="number" id='porcentaje_estadistica' name="estadistica" class="form-control">
                            <span class="input-group-text">%</span>
                          </div>
                          <small id="porcentaje_estadistica_warning" class="warning"></small>
                        </div>
                    </div>
                    <div class="row">    
                        <div class="col-md-4 mb-3">
                            <input type="hidden" name="base_iva">
                            <div  id='resultado_baseIVA'></div>
                        </div>
                    </div>
                    <div class="row">    
                        <div class="col-md-2 mb-3">
                          <label class="form-label">IVA</label>
                          <div class="input-group">
                            <input type="number" id='iva' name="iva" class="form-control">
                            <span class="input-group-text">%</span>
                          </div>
                          <small id="iva_warning" class="warning"></small>
                        </div>  
                        <div class="col-md-2 mb-3">
                          <label class="form-label">IVA Adicional</label>
                          <div class="input-group">
                            <input type="number" id='ivaAD' name="ivaAD" class="form-control">
                            <span class="input-group-text">%</span>
                          </div>
                          <small id="ivaAD_warning" class="warning"></small>
                        </div>  
                        <div class="col-md-2 mb-3">
                          <label class="form-label">Ganancia</label>
                          <div class="input-group">
                            <input type="number" id='ganancia' name="ganancia" class="form-control">
                            <span class="input-group-text">%</span>
                          </div>
                          <small id="ganancia_warning" class="warning"></small>
                        </div>  
                        <div class="col-md-2 mb-3">
                          <label class="form-label">Ingresos brutos</label>
                          <div class="input-group">
                            <input type="number" step="any" id='ingBr' name="ingBr" class="form-control">
                            <span class="input-group-text">%</span>
                          </div>
                          <small id="ingBr_warning" class="warning"></small>
                        </div>  
                        <div class="col-md-2 mb-3">
                          <label class="form-label">Arancel SIM</label>
                          <div class="input-group">
                            <input type="number" id='arancel_sim' name="arancel_sim" class="form-control">
                            <span class="input-group-text">USD</span>
                          </div>
                          <small id="arancel_sim_warning" class="warning"></small>
                        </div>  
                    </div>
                    <div class="row">    
                        <div class="col-md-4 mb-3">
                          <input type="hidden" name="res_gravamenes" id="res_gravamenes">
                            <div id='resultado_gravamenes'></div>
                        </div>
                    </div>
                    <div class="row">    
                          <div class="col-md-4 mb-3">
                            <input type="hidden" name="res_sinH" id="res_sinH">
                            <div id='total_sinH'></div>
                        </div>
                    </div>
                    <div class="row">    
                      <h6>Honorarios del despachante de aduana</h6>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Honorarios</label>
                            <div class="input-group">
                              <input id="honorarios" name="honorario" type="number" class="form-control">
                              <span class="input-group-text">USD</span>
                            </div>
                            <small id="honorarios_warning" class="warning"></small>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Gasto operativo</label>
                            <div class="input-group">
                              <input id="gasto_op" name="gasto_op" type="number" class="form-control">
                              <span class="input-group-text">USD</span>
                            </div>
                            <small id="gasto_op_warning" class="warning"></small>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Senasa</label>
                            <div class="input-group">
                              <input id="senasa"name="senasa" type="number" class="form-control">
                              <span class="input-group-text">USD</span>
                            </div>
                            <small id="senasa_warning" class="warning"></small>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Digitalizacion</label>
                            <div class="input-group">
                              <input id="dig" name="dig" type="number" class="form-control">
                              <span class="input-group-text">USD</span>
                            </div>
                            <small id="dig_warning" class="warning"></small>
                        </div>
                    </div>
                    <div class="row">    
                        <div class="col-md-4 mb-3">
                          <input type="hidden" name="res_conH" id="res_conH">
                            <div id='total_conH'></div>
                      </div>
                    </div>
              </div>      
              <input type="hidden" name="res_cif" id="res_cif">
              <input type="hidden" name="res_derechos" id="res_derechos">
              <input type="hidden" name="res_estadistica" id="res_estadistica">
              <input type="hidden" name="res_base_iva" id="res_base_iva">
              <input type="hidden" name="res_iva" id="res_iva">
              <input type="hidden" name="res_iva_adic" id="res_iva_adic">
              <input type="hidden" name="res_ganancia" id="res_ganancia">
              <input type="hidden" name="res_ib" id="res_ib">
              <input type="hidden" name="res_arancel" id="res_arancel">
              <input type="hidden" name="res_fob" id="res_fob">
              <input type="hidden" name="res_flete" id="res_flete">
              <input type="hidden" name="res_seguro" id="res_seguro">

              <div class="text-center mt-3">
                      <button type="button" class="btn btn-secondary me-2" onclick="cerrar()">Cerrar</button>
                      <button type="submit" id="btnCalcular" class="btn btn-secondary me-2">Presupuesto</button>
                  </div>      
            </div>
        </form>
    </section>
</main>

<script>
  function cerrar(){
    window.location.href= 'index.php'
  }
</script>



  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
  <script src="assets/js/cotizacion.js" defer></script>
</body>
</html>