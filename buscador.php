<?php
include ("conexion.php");

$cliente = isset($_POST['cliente']) ? trim($_POST['cliente']) : null;
$mercaderia = isset($_POST['mercaderia']) ? trim($_POST['mercaderia']) : null;
$destinacion = isset($_POST['destinacion']) ? trim($_POST['destinacion']) : null;
$digitalizacion = isset($_POST['digitalizacion']) ? trim($_POST['digitalizacion']) : null;
$transporte = isset($_POST['transporte']) ? trim($_POST['transporte']) : null;
$fechaDesde = isset($_POST['fechaDesde']) ? trim($_POST['fechaDesde']) : null;
$fechaHasta = isset($_POST['fechaHasta']) ? trim($_POST['fechaHasta']) : null;

$query = "SELECT 
            operacion.destinacion, 
            operacion.mercaderia, 
            operacion.nroOficializacion, 
            operacion.fechaOficializacion, 
            transporte.nombre AS nombreTransporte, 
            digitalizacion.nombre AS digitalizacion, 
            cliente.nroCliente, 
            cliente.razonSocial 
          FROM operacion 
          INNER JOIN transporte ON operacion.transporte_id = transporte.ID 
          INNER JOIN digitalizacion ON operacion.digitalizacion_id = digitalizacion.ID 
          INNER JOIN cliente ON operacion.cliente_nro = cliente.nroCliente 
          WHERE operacion.ESTADO = 'A'";

$filtros = [];
$tipo = "";

// Añadir filtros si están definidos
if ($cliente) {
    $query .= " AND cliente.razonSocial = ?";
    $filtros[] = $cliente;
    $tipo .= "s";
}
if ($mercaderia) {
    $query .= " AND operacion.mercaderia = ?";
    $filtros[] = $mercaderia;
    $tipo .= "s";
}
if ($destinacion) {
    $query .= " AND operacion.destinacion = ?";
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
    $query .= " AND operacion.fechaOficializacion BETWEEN ? AND ?";
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


$mercaderia="SELECT NOMBRE FROM MERCADERIA WHERE ESTADO='A'";
$resultado_merc=mysqli_query($conexion,$mercaderia);
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

    <!-- Select2 Bootstrap 5 Theme -->
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
   <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.6.2/dist/select2-bootstrap4.min.css" rel="stylesheet" />

   <!-- CSS de Select2 -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<main>
    <section class="section">
        <div class="container">
        <div class="container-title" style=" margin-top: 70px; margin-bottom: 40px">
            <h2 class="text-center mb-4">Sistema de Consultas</h2>
        </div>  
            <div style="background-color:lightgray; padding: 20px;">  
                <form class="form" method="POST" >
                
                    <div class="row g-3">
                        <!-- Cliente -->
                        <div class="col-md-2 mb-4">
                            <label for="cliente" class="form-label">Cliente</label>
                            <input type="text" class="form-control form-control-sm" id="cliente" name="cliente" value="<?php echo htmlspecialchars($cliente); ?>">
                        </div>
                    </div>    
                    <div class="row g-3">
                        <!-- Mercaderia -->
                        <div class="col-md-2 mb-2">
                            <label for="mercaderia" class="form-label">Mercaderia</label>
                            <select id='mercaderia' name="mercaderia" class="form-control form-control-sm" required>
                            <option value="">Seleccione una opcion</option>
                            <?php
                             while ($fila = $resultado_merc->fetch_assoc()) {
                                echo "<option value='" . $fila['NOMBRE'] . "'>" . $fila['NOMBRE'] . "</option>";
                          }                          
                            ?>
                          </select>
                        </div>
                        <!-- Destinación -->
                        <div class="col-md-2">
                            <label for="destinacion" class="form-label">Destinación</label>
                            <input type="text" class="form-control form-control-sm" id="destinacion" name="destinacion" value="<?php echo htmlspecialchars($destinacion); ?>">
                        </div>
                        <!-- Digitalización -->
                        <div class="col-md-3">
                            <label for="digitalizacion" class="form-label">Empresa digitalizadora</label>
                            <select id="digi" class="form-control form-control-sm" name="digitalizacion">
                                <option value="">Todos</option>
                                <option value="Lakaut" <?php if ($digitalizacion == "Lakaut") echo "selected"; ?>>Lakaut</option>
                                <option value="Modoc" <?php if ($digitalizacion == "Modoc") echo "selected"; ?>>Modoc</option>
                            </select>
                        </div>
                        <!-- Transporte -->
                        <div class="col-md-3">
                            <label for="transporte" class="form-label">Transporte</label>
                            <select id="transp" class="form-control form-control-sm" name="transporte">
                                <option value="">Todos</option>
                                <option value="Avion" <?php if ($transporte == "Avion") echo "selected"; ?>>Avión</option>
                                <option value="Barco" <?php if ($transporte == "Barco") echo "selected"; ?>>Barco</option>
                                <option value="Tren" <?php if ($transporte == "Tren") echo "selected"; ?>>Tren</option>
                                <option value="Camion" <?php if ($transporte == "Camion") echo "selected"; ?>>Camión</option>
                            </select>
                        </div>
                    </div>    
                    <div class="row g-3">
                        <!-- Fechas -->
                        <div class="col-md-3">
                            <label for="fechaDesde" class="form-label">Desde</label>
                            <input type="date" class="form-control form-control-sm" id="fechaDesde" name="fechaDesde" value="<?php echo htmlspecialchars($fechaDesde); ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="fechaHasta" class="form-label">Hasta</label>
                            <input type="date" class="form-control form-control-sm" id="fechaHasta" name="fechaHasta" value="<?php echo htmlspecialchars($fechaHasta); ?>">
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
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  
  <!-- jQuery + Validations -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

<!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<!-- Archivo de idioma español de Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/es.min.js"></script>

  <script>
    $(document).ready(function() {
    $('#transp').select2({
        placeholder: "Seleccione una opcion",
        allowClear: true,
        width: '100%',
        language: "es"
    });
    $('#digi').select2({
        placeholder: "Seleccione una opcion",
        allowClear: true,
        width: '100%',
        language: "es"
    });
    $('#mercaderia').select2({
        placeholder: "Seleccione una opcion",
        allowClear: true,
        width: '100%',
        language: "es"
    });
});
  </script>

</body>
</html>
 