<?php
include ("conexion.php");

$razonSocial = isset($_POST['razonSocial']) ? trim($_POST['razonSocial']) : '';
$domicilioFiscal = isset($_POST['domicilioFiscal']) ? trim($_POST['domicilioFiscal']) : '';
$nroDomicilio = isset($_POST["numero"]) ? intval($_POST["numero"]) : 0;
$piso = isset($_POST["piso"]) ? intval($_POST["piso"]) : 0;
$depto = isset($_POST["departamento"]) ? trim($_POST["departamento"]) : '';
$localidad = isset($_POST["localidad"]) ? trim($_POST["localidad"]) : '';
$provincia = isset($_POST["provincia"]) ? trim($_POST["provincia"]) : '';
$codigoPostal = isset($_POST["codigoPostal"]) ? intval($_POST["codigoPostal"]) : 0;
$telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : '';
$email = isset($_POST["email"]) ? trim($_POST["email"]) : '';
$cuit = isset($_POST["CUIT"]) ? trim($_POST["CUIT"]) : '';
$condicionIva = isset($_POST["condicion_id"]) ? intval($_POST["condicion_id"]) : 0;


$sql = "INSERT INTO clienteprueba (razonSocial, domicilioFiscal, numero, piso, departamento, localidad, provincia, codigoPostal, telefono, email, CUIT, condicion_id) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$consulta = mysqli_prepare($conexion, $sql);

mysqli_stmt_bind_param($consulta, "ssiiississsi", $razonSocial, $domicilioFiscal, $nroDomicilio, $piso, $depto, $localidad, $provincia, $codigoPostal, $telefono, $email, $cuit, $condicionIva);

if (mysqli_stmt_execute($consulta)) {
    header("Location: listado-clientes.php");
} else {
    echo "Error: " . mysqli_error($conexion);
}


// Cerrar conexión
mysqli_stmt_close($consulta);
mysqli_close($conexion);
?>
