<?php
include("conexion.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT nroCliente, razonSocial, domicilioFiscal, piso, departamento, localidad, provincia, codigoPostal, telefono, email, CUIT, condicioniva.nombre AS condicionIVA_nombre 
            FROM cliente 
            INNER JOIN condicioniva ON condicion_id = condicioniva.ID 
            WHERE nroCliente = $id AND ESTADO = 'A'";
    $result = mysqli_query($conexion, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        echo "
            <table class='table table-bordered'>
                <tr><th>Nro Cliente</th><td>{$row['nroCliente']}</td></tr>
                <tr><th>Razón Social</th><td>{$row['razonSocial']}</td></tr>
                <tr><th>Domicilio Fiscal</th><td>{$row['domicilioFiscal']}</td></tr>
                <tr><th>Piso</th><td>{$row['piso']}</td></tr>
                <tr><th>Departamento</th><td>{$row['departamento']}</td></tr>
                <tr><th>Localidad</th><td>{$row['localidad']}</td></tr>
                <tr><th>Provincia</th><td>{$row['provincia']}</td></tr>
                <tr><th>Código Postal</th><td>{$row['codigoPostal']}</td></tr>
                <tr><th>Teléfono</th><td>{$row['telefono']}</td></tr>
                <tr><th>Email</th><td>{$row['email']}</td></tr>
                <tr><th>CUIT</th><td>{$row['CUIT']}</td></tr>
                <tr><th>Condición IVA</th><td>{$row['condicionIVA_nombre']}</td></tr>
            </table>
        ";
    } else {
        echo "<p>No se encontraron datos para este cliente.</p>";
    }
} else {
    echo "<p>ID del cliente no especificado.</p>";
}
?>