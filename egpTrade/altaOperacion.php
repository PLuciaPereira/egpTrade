<?php
include("conexion.php");

// Recuperar y sanitizar datos del formulario
$destinacion = isset($_POST['destinacion']) ? mysqli_real_escape_string($conexion, $_POST['destinacion']) : '';
$mercaderia = isset($_POST['mercaderia']) ? mysqli_real_escape_string($conexion, $_POST['mercaderia']) : '';
$numOficializacion = isset($_POST["nroOficializacion"]) ? mysqli_real_escape_string($conexion, $_POST["nroOficializacion"]) : '';
$fecha_Of = isset($_POST["fechaOficializacion"]) ? mysqli_real_escape_string($conexion, $_POST["fechaOficializacion"]) : '';
$transporte = isset($_POST["transporte_id"]) ? mysqli_real_escape_string($conexion, $_POST["transporte_id"]) : '';
$digitalizacion = isset($_POST["digitalizacion_id"]) ? mysqli_real_escape_string($conexion, $_POST["digitalizacion_id"]) : '';
$nrocliente = isset($_POST["cliente_nro"]) ? mysqli_real_escape_string($conexion, $_POST["cliente_nro"]) : '';

// Verificar si el transporte seleccionado existe
$checkTransporte = "SELECT COUNT(*) AS count FROM transporte WHERE ID = '$transporte'";
$resultTransporte = mysqli_query($conexion, $checkTransporte);
$rowTransporte = mysqli_fetch_assoc($resultTransporte);

if ($rowTransporte['count'] == 0) {
    die("Error: El transporte seleccionado no existe en la tabla transporte.");
}

// Verificar si la digitalización seleccionada existe (opcional)
$checkDigitalizacion = "SELECT COUNT(*) AS count FROM digitalizacion WHERE ID = '$digitalizacion'";
$resultDigitalizacion = mysqli_query($conexion, $checkDigitalizacion);
$rowDigitalizacion = mysqli_fetch_assoc($resultDigitalizacion);

if ($rowDigitalizacion['count'] == 0) {
    die("Error: La digitalización seleccionada no existe en la tabla digitalización.");
}

// Insertar los datos en la tabla `operacion`
$sql = "INSERT INTO operacionprueba (destinacion, mercaderia, nroOficializacion, fechaOficializacion, transporte_id, digitalizacion_id, cliente_nro) 
        VALUES ('$destinacion', '$mercaderia', '$numOficializacion', '$fecha_Of', '$transporte', '$digitalizacion', '$nrocliente')";
$query = mysqli_query($conexion, $sql);

if ($query) {
    header("Location: listado-operaciones.php");
} else { 
    echo "Error al ejecutar la consulta: " . mysqli_error($conexion) . "<br>";
    echo "Consulta ejecutada: " . $sql;
}
?>
