<?php
    include('conexion.php');
    include("session_control.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Mercaderia</title>

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
        <form class="form" action="altaMercaderia.php" method="POST" id="form-clientes">
            <div class="container">
                <div class="container-title" style=" margin-top: 30px; margin-bottom: 30px">
                    <h1>Alta de mercaderia</h1>
                </div>
                <div class="container-body">
                    <div class="row">
                        <div class="col-md-4 mb-1">
                            <label for="mercaderia" class="form-label">Mercaderia</label>
                            <input id="mercaderia" name="mercaderia" placeholder="Ej: Repuestos de bicicletas" type="text" class="form-control form-control-sm" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-1">
                            <label for="pOrigen" class="form-label">Pais de origen</label>
                            <select id='pOrigen' name="origen" class="form-control form-control-sm" required>
                                <option value="">Seleccione una opcion</option>
                                <?php
                                
                                    $consulta="SELECT codigo, nombre FROM paises";
                                    $resultado=mysqli_query($conexion,$consulta);
                                    while ($fila = $resultado->fetch_assoc()) {
                                        echo "<option value='" . $fila['codigo'] . "'>" . $fila['nombre'] . "</option>";
                                    }
                                    $resultado->data_seek(0); // 
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="pProce" class="form-label">Pais de procedencia</label>
                                <select id='pProce' name="procedencia" class="form-control form-control-sm" required>
                                <option value="">Seleccione una opcion</option>
                                <?php
                                while ($procedencia = $resultado->fetch_assoc()) {
                                    echo "<option value='" . $procedencia['codigo'] . "'>" . $procedencia['nombre'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 mb-1">
                            <label for="descripcion" class="form-label">Descripcion</label><br>
                            <textarea name="desc" id="descripcion" rows="5" cols="100"></textarea>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                        <button type="button" class="btn btn-secondary" onclick="cancelar()">Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
    </section> 
  </main>

  <script>
    function cancelar(){
      window.location.href= 'index.php'
    }
  </script>
  </script>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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
    
    $('#pOrigen').select2({
        placeholder: "Seleccione una opcion",
        allowClear: true,
        width: '100%',
        language: 'es'
    });
    $('#pProce').select2({
        placeholder: "Seleccione una opcion",
        allowClear: true,
        width: '100%',
        language: 'es'
    });

});
</script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
</html>