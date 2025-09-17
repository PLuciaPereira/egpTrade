<?php
include ("conexion.php");
include("session_control.php");

$query = "SELECT 
    cliente.razonSocial,
    operacion.destinacion,
    operacion.provExtranjero,
    operacion.idTributario,
    mercaderia.nombre AS nombre_mercaderia,
    pais_origen.nombre AS nombre_origen,
    pais_procedencia.nombre AS nombre_procedencia,
    operacion.nroOficializacion,
    operacion.fechaOficializacion,
    digitalizacion.nombre AS digitalizacion,
    transporte.nombre AS nombreTransporte
FROM operacion
INNER JOIN cliente ON operacion.cliente_nro = cliente.nroCliente
INNER JOIN mercaderia ON operacion.mercaderia_id = mercaderia.codigo
LEFT JOIN paises AS pais_origen ON mercaderia.origen = pais_origen.codigo
LEFT JOIN paises AS pais_procedencia ON mercaderia.procedencia = pais_procedencia.codigo
INNER JOIN digitalizacion ON operacion.digitalizacion_id = digitalizacion.ID
INNER JOIN transporte ON operacion.transporte_id = transporte.ID
WHERE operacion.ESTADO = 'A'";

$resQuery = mysqli_query($conexion,$query);

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Buscar</title>
     <link href="assets/img/icono.webp" rel="icon">
     <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/3.2.2/css/buttons.bootstrap5.css" rel="stylesheet">

    <!-- Icons -->
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <!-- Main CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
<main>
    <section class="section">
        <div class="container card bg-light shadow-sm p-4" style="margin-top: 40px; padding: 25px;">
            <div class="container-title" style="margin-top: 20px; margin-bottom: 20px;">
                <h3 class="text-center mb-4">Sistema de Consultas</h3>
            </div>  
            <div>  
                <div class="table-responsive">
                    <table id="example" class="table table-hover table-striped text-center" style="font-size: 13.5px; font-family: Poppins; white-space: nowrap; border: 5px; box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);">
                        <thead class="table-dark">
                            <tr>
                                <th>Cliente</th>
                                <th>Destinación</th>
                                <th>Proveedor extranjero</th>
                                <th>ID Tributario</th>
                                <th>Mercadería</th>
                                <th>Pais origen</th>
                                <th>Pais procedencia</th>
                                <th>Nro Oficialización</th>
                                <th>Fecha Oficialización</th>
                                <th>Empresa Digitalizadora</th>
                                <th>Transporte</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($resQuery && mysqli_num_rows($resQuery) > 0) { ?>
                                <?php while ($fila = mysqli_fetch_assoc($resQuery)) { ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($fila['razonSocial']); ?></td>
                                        <td><?php echo htmlspecialchars($fila['destinacion']); ?></td>
                                        <td><?php echo htmlspecialchars($fila['provExtranjero']); ?></td>
                                        <td><?php echo htmlspecialchars($fila['idTributario']); ?></td>
                                        <td><?php echo htmlspecialchars($fila['nombre_mercaderia']); ?></td>
                                        <td><?php echo htmlspecialchars($fila['nombre_origen']); ?></td>
                                        <td><?php echo htmlspecialchars($fila['nombre_procedencia']); ?></td>
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

<!-- Botón Volver -->
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
    onmouseout="this.style.backgroundColor='#012970'">
    <i class="bi bi-arrow-left-short"></i>
</a>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

<!-- DataTables Buttons -->
<script src="https://cdn.datatables.net/buttons/3.2.2/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.2/js/buttons.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.2/js/buttons.colVis.min.js"></script>

<!-- Inicializar DataTable -->
<script>
    new DataTable('#example', {
        layout: {
            topStart: {
                buttons: ['colvis']
            }
        },
        language: {
            url: 'assets/js/es-ES.json',
            paginate: {
                first: '<<',
                previous: '<',
                next: '>',
                last: '>>'
            }
        }
    });
    document.querySelector('#example').addEventListener('datatable.init', function () {
        document.querySelector('#example_filter input').placeholder = 'Buscar por cliente, mercadería, país...';
});
</script>

</body>
</html>
