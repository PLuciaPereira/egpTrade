<?php
include("conexion.php");


$id_op = isset($_POST['nroOperacion']) ? $_POST['nroOperacion'] : '';
$destinacion = isset($_POST['destinacion']) ? mysqli_real_escape_string($conexion, $_POST['destinacion']) : '';
$mercaderia = isset($_POST['mercaderia']) ? mysqli_real_escape_string($conexion, $_POST['mercaderia']) : '';
$numOficializacion = isset($_POST["nroOficializacion"]) ? mysqli_real_escape_string($conexion, $_POST["nroOficializacion"]) : '';
$fecha_Of = isset($_POST["fechaOficializacion"]) ? mysqli_real_escape_string($conexion, $_POST["fechaOficializacion"]) : '';
$transporte = isset($_POST["transporte_id"]) ? mysqli_real_escape_string($conexion, $_POST["transporte_id"]) : '';
$digitalizacion = isset($_POST["digitalizacion_id"]) ? mysqli_real_escape_string($conexion, $_POST["digitalizacion_id"]) : '';


$consulta = "UPDATE operacionprueba 
             SET destinacion='$destinacion', 
                 mercaderia='$mercaderia', 
                 nroOficializacion='$numOficializacion', 
                 fechaOficializacion='$fecha_Of', 
                 transporte_id='$transporte', 
                 digitalizacion_id='$digitalizacion' 
             WHERE nroOperacion='$id_op'";

$query= mysqli_query($conexion, $consulta);

if ($query) {
    header("Location: listado-operaciones.php");
    exit;
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}
?>
