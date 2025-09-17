<?php
session_start();
include("session_control.php");
include("conexion.php");

$id_cliente       = isset($_POST["nroCliente"]) ? $_POST["nroCliente"] : '';
$razonSocial      = isset($_POST['razonSocial']) ? trim($_POST['razonSocial']) : '';
$domicilioFiscal  = isset($_POST['domicilioFiscal'])? trim($_POST['domicilioFiscal']) : '';
$piso             = isset($_POST["piso"])? trim($_POST["piso"]) : '';
$depto            = isset($_POST["departamento"]) ? trim($_POST["departamento"]) : '';
$localidad        = isset($_POST["localidad"]) ? trim($_POST["localidad"]) : '';
$provincia        = isset($_POST["provincia"]) ? trim($_POST["provincia"]) : '';
$codigoPostal     = isset($_POST["codigoPostal"]) ? trim($_POST["codigoPostal"]) : '';
$telefono         = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : '';
$email            = isset($_POST["email"]) ? trim($_POST["email"]) : '';
$cuit             = isset($_POST["cuit"]) ? trim($_POST["cuit"]) : '';
$condIva          = isset($_POST["condicion_id"]) ? trim($_POST["condicion_id"]) : '';

$_SESSION['datos_modificar'] = $_POST;

$consultaDuplicados = $conexion->prepare("
    SELECT CUIT, telefono, email FROM cliente 
    WHERE ESTADO = 'A' 
    AND nroCliente != ? 
    AND (CUIT = ? OR telefono = ? OR email = ?)
");
$consultaDuplicados->bind_param("isss", $id_cliente, $cuit, $telefono, $email);
$consultaDuplicados->execute();
$resultado = $consultaDuplicados->get_result();

if ($resultado->num_rows > 0) {
    $repetido = $resultado->fetch_assoc();

    if ($repetido['CUIT'] === $cuit) {
        $campoDuplicado = 'CUIT';
    } elseif ($repetido['telefono'] === $telefono) {
        $campoDuplicado = 'Teléfono';
    } elseif ($repetido['email'] === $email) {
        $campoDuplicado = 'Email';
    } else {
        $campoDuplicado = 'Dato';
    }

    header("Location: updateForm.php?id=$id_cliente&campoRepetido=" . urlencode($campoDuplicado));
    exit;

}
    $consulta = $conexion -> prepare("UPDATE cliente SET 
        razonSocial = ?,
        domicilioFiscal = ?,
        piso = ?,
        departamento = ?,
        localidad = ?,
        provincia = ?,
        codigoPostal = ?,
        telefono = ?,
        email = ?,
        CUIT = ?,
        condicion_id = ?
        WHERE nroCliente = ?"); 
    $consulta -> bind_param("ssssssssssii", $razonSocial, $domicilioFiscal, $piso, $depto, $localidad, $provincia, $codigoPostal, $telefono, $email, $cuit, $condIva, $id_cliente);
    

    if ($consulta ->execute()) {
        unset($_SESSION['datos_modificar']);
        header("Location: listadoClientes.php");
        exit;
    } else {
        echo "Error en la consulta: " . mysqli_error($conexion);
        echo "<br>Consulta ejecutada: " . $consulta;
    }

?>
