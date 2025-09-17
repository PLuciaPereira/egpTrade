<?php
session_start();
include("session_control.php");

include("conexion.php");

$id_op = isset($_POST['nroOperacion']) ? $_POST['nroOperacion'] : '';
$destinacion = isset($_POST['destinacion']) ?  trim($_POST['destinacion']) : '';
$mercaderia = isset($_POST['mercaderia']) ?  trim($_POST['mercaderia']) : '';
$numOficializacion = isset($_POST["nroOficializacion"]) ?  trim($_POST["nroOficializacion"]) : '';
$fecha_Of = isset($_POST["fechaOficializacion"]) ?  trim($_POST["fechaOficializacion"]) : '';
$transporte = isset($_POST["transporte_id"]) ?  trim($_POST["transporte_id"]) : '';
$digitalizacion = isset($_POST["digitalizacion_id"]) ?  trim($_POST["digitalizacion_id"]) : '';
$digitalizacion = isset($_POST["digitalizacion_id"]) ?  trim($_POST["digitalizacion_id"]) : '';
$provExtranjero = isset($_POST["prov"]) ?  trim($_POST["prov"]) : '';
$idTributario = isset($_POST["idT"]) ?  trim($_POST["idT"]) : '';

$_SESSION['datos_modificar'] = $_POST;

$consultaDuplicados = $conexion->prepare("
    SELECT * FROM OPERACION WHERE nroOficializacion = ? AND ESTADO = 'A'AND nroOperacion != ?");
$consultaDuplicados->bind_param("si", $numOficializacion, $id_op);
$consultaDuplicados->execute();
$resultado = $consultaDuplicados->get_result();

if ($resultado->num_rows > 0) {
    $repetido = $resultado->fetch_assoc();

    if ($repetido['nroOficializacion'] === $numOficializacion) {
        $campoDuplicado = 'Nro de oficializacion';
    } else {
        $campoDuplicado = 'Dato';
    }

    header("Location: updateFormOp.php?id=$id_op&campoRepetido=" . urlencode($campoDuplicado));
    exit;
}
    $consulta = $conexion -> prepare("UPDATE operacion 
                SET destinacion=?, 
                    mercaderia_id=?, 
                    nroOficializacion=?, 
                    fechaOficializacion=?, 
                    transporte_id=?, 
                    digitalizacion_id=?,
                    provExtranjero=?,
                    idTributario=? 
                WHERE nroOperacion=?");
    $consulta -> bind_param("sissiissi", $destinacion, $mercaderia, $numOficializacion, $fecha_Of, $transporte, $digitalizacion, $provExtranjero, $idTributario, $id_op);

    if ($consulta -> execute()) {
        unset($_SESSION['datos_modificar']);
        header("Location: listadoOperaciones.php");
        exit;
    } else {
        echo "Error en la consulta: " . mysqli_error($conexion);
    }


?>
