<?php
session_start();
include("conexion.php");

$razonSocial     = isset($_POST['razonSocial']) ? trim($_POST['razonSocial']) : '';
$domicilioFiscal = isset($_POST['domicilioFiscal']) ? trim($_POST['domicilioFiscal']) : '';
$piso            = isset($_POST["piso"]) ? intval($_POST["piso"]) : 0;
$depto           = isset($_POST["departamento"]) ? trim($_POST["departamento"]) : '';
$localidad       = isset($_POST["localidad"]) ? trim($_POST["localidad"]) : '';
$provincia       = isset($_POST["provincia"]) ? trim($_POST["provincia"]) : '';
$codigoPostal    = isset($_POST["codigoPostal"]) ? intval($_POST["codigoPostal"]) : 0;
$telefono        = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : '';
$email           = isset($_POST["email"]) ? trim($_POST["email"]) : '';
$cuit            = isset($_POST["CUIT"]) ? trim($_POST["CUIT"]) : '';
$condicionIva    = isset($_POST["condicion_id"]) ? intval($_POST["condicion_id"]) : 0;

$_SESSION['datos'] = $_POST; 

// Validación de repetidos con consulta preparada
$query = "SELECT CUIT, telefono, email FROM cliente 
          WHERE ESTADO = 'A' 
          AND (CUIT = ? OR telefono = ? OR email = ?)";

$stmt = mysqli_prepare($conexion, $query);
mysqli_stmt_bind_param($stmt, "sss", $cuit, $telefono, $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    $campoRepetido = 'Dato';
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['CUIT'] === $cuit) {
            $campoRepetido = 'CUIT';
            break;
        }
        if ($row['telefono'] === $telefono) {
            $campoRepetido = 'Teléfono';
            break;
        }
        if ($row['email'] === $email) {
            $campoRepetido = 'Email';
            break;
        }
    }

    header("Location: formularioClientes.php?campoRepetido=" . urlencode($campoRepetido));
    exit;
}

// Inserción del nuevo cliente
$sql = "INSERT INTO cliente 
        (razonSocial, domicilioFiscal, piso, departamento, localidad, provincia, codigoPostal, telefono, email, CUIT, condicion_id) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$consulta = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($consulta, "ssssssssssi", $razonSocial, $domicilioFiscal, $piso, $depto, $localidad, $provincia, $codigoPostal, $telefono, $email, $cuit, $condicionIva);

if (mysqli_stmt_execute($consulta)) {
    unset($_SESSION['datos']);
    header("Location: listadoClientes.php");
} else {
    echo "Error: " . mysqli_error($conexion);
}

mysqli_stmt_close($consulta);
mysqli_close($conexion);
?>
