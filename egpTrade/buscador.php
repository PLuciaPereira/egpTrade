<?php
include ("conexion.php");

$cliente = isset($_POST['cliente']) ? trim($_POST['cliente']) : null;
$destinacion = isset($_POST['destinacion']) ? trim($_POST['destinacion']) : null;
$digitalizacion = isset($_POST['digitalizacion']) ? trim($_POST['digitalizacion']) : null;
$transporte = isset($_POST['transporte']) ? trim($_POST['transporte']) : null;
$fechaDesde = isset($_POST['fechaDesde']) ? trim($_POST['fechaDesde']) : null;
$fechaHasta = isset($_POST['fechaHasta']) ? trim($_POST['fechaHasta']) : null;

$query = "SELECT 
            operacionprueba.destinacion, 
            operacionprueba.mercaderia, 
            operacionprueba.nroOficializacion, 
            operacionprueba.fechaOficializacion, 
            transporte.nombre AS nombreTransporte, 
            digitalizacion.nombre AS digitalizacion, 
            cliente.nroCliente, 
            cliente.razonSocial 
          FROM operacionprueba 
          INNER JOIN transporte ON operacionprueba.transporte_id = transporte.ID 
          INNER JOIN digitalizacion ON operacionprueba.digitalizacion_id = digitalizacion.ID 
          INNER JOIN cliente ON operacionprueba.cliente_nro = cliente.nroCliente 
          WHERE operacionprueba.ESTADO = 'A'";

$filtros = [];
$tipo = "";

// Añadir filtros si están definidos
if ($cliente) {
    $query .= " AND clienteprueba.razonSocial = ?";
    $filtros[] = $cliente;
    $tipo .= "s";
}
if ($destinacion) {
    $query .= " AND operacionprueba.destinacion = ?";
    $filtros[] = $destinacion;
    $tipo .= "s";
}
if ($digitalizacion) {
    $query .= " AND digitalizacion.nombre = ?";
    $filtros[] = $digitalizacion;
    $tipo .= "s";
}
if ($transporte) {
    $query .= " AND transporte.nombre = ?";
    $filtros[] = $transporte;
    $tipo .= "s";
}
if ($fechaDesde && $fechaHasta) {
    $query .= " AND operacionprueba.fechaOficializacion BETWEEN ? AND ?";
    $filtros[] = $fechaDesde;
    $filtros[] = $fechaHasta;
    $tipo .= "ss";
}

$stmt = mysqli_prepare($conexion, $query);
if (!$stmt) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

// Asignar parámetros si hay filtros
if (!empty($filtros)) {
    mysqli_stmt_bind_param($stmt, $tipo, ...$filtros);
}

// Ejecutar y obtener resultados
mysqli_stmt_execute($stmt);
$resultados = mysqli_stmt_get_result($stmt);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Buscar</title>
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
<main class="main-buscador">
    <section class="section">
        <div class="container">
        <div class="container-title">
            <h2 class="text-center mb-4">Buscador</h2>
        </div>    
            <form class="form" method="POST" >
                <div class="row g-3">
                    <!-- Cliente -->
                    <div class="col-md-12">
                        <label for="cliente" class="form-label">Cliente</label>
                        <input type="text" class="form-control" id="cliente" name="cliente" value="<?php echo htmlspecialchars($cliente); ?>">
                    </div>
                    <!-- Destinación -->
                    <div class="col-md-3">
                        <label for="destinacion" class="form-label">Destinación</label>
                        <input type="text" class="form-control" id="destinacion" name="destinacion" value="<?php echo htmlspecialchars($destinacion); ?>">
                    </div>
                    <!-- Digitalización -->
                    <div class="col-md-3">
                        <label for="digitalizacion" class="form-label">Empresa digitalizadora</label>
                        <select class="form-select" id="digitalizacion" name="digitalizacion">
                            <option value="">Todos</option>
                            <option value="Lakaut" <?php if ($digitalizacion == "Lakaut") echo "selected"; ?>>Lakaut</option>
                            <option value="Modoc" <?php if ($digitalizacion == "Modoc") echo "selected"; ?>>Modoc</option>
                        </select>
                    </div>
                    <!-- Transporte -->
                    <div class="col-md-3">
                        <label for="transporte" class="form-label">Transporte</label>
                        <select class="form-select" id="transporte" name="transporte">
                            <option value="">Todos</option>
                            <option value="Avion" <?php if ($transporte == "Avion") echo "selected"; ?>>Avión</option>
                            <option value="Barco" <?php if ($transporte == "Barco") echo "selected"; ?>>Barco</option>
                            <option value="Tren" <?php if ($transporte == "Tren") echo "selected"; ?>>Tren</option>
                            <option value="Camion" <?php if ($transporte == "Camion") echo "selected"; ?>>Camión</option>
                        </select>
                    </div>
                    <!-- Fechas -->
                    <div class="col-md-3">
                        <label for="fechaDesde" class="form-label">Desde</label>
                        <input type="date" class="form-control" id="fechaDesde" name="fechaDesde" value="<?php echo htmlspecialchars($fechaDesde); ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="fechaHasta" class="form-label">Hasta</label>
                        <input type="date" class="form-control" id="fechaHasta" name="fechaHasta" value="<?php echo htmlspecialchars($fechaHasta); ?>">
                    </div>
                </div>
                <div class="mt-3 text-end">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>

            <!-- Resultados -->
            <h5>Resultados encontrados</h5>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" style="font-size: 14px;">
                    <thead class="table-dark">
                        <tr>
                            <th>Nro Cliente</th>
                            <th>Cliente</th>
                            <th>Destinación</th>
                            <th>Mercadería</th>
                            <th>Nro Oficialización</th>
                            <th>Fecha Oficialización</th>
                            <th>Empresa Digitalizadora</th>
                            <th>Transporte</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($resultados && mysqli_num_rows($resultados) > 0) { ?>
                            <?php while ($fila = mysqli_fetch_assoc($resultados)) { ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($fila['nroCliente']); ?></td>
                                    <td><?php echo htmlspecialchars($fila['razonSocial']); ?></td>
                                    <td><?php echo htmlspecialchars($fila['destinacion']); ?></td>
                                    <td><?php echo htmlspecialchars($fila['mercaderia']); ?></td>
                                    <td><?php echo htmlspecialchars($fila['nroOficializacion']); ?></td>
                                    <td><?php echo htmlspecialchars($fila['fechaOficializacion']); ?></td>
                                    <td><?php echo htmlspecialchars($fila['digitalizacion']); ?></td>
                                    <td><?php echo htmlspecialchars($fila['nombreTransporte']); ?></td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="8" class="text-center">No se encontraron resultados</td>
                            </tr>
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
